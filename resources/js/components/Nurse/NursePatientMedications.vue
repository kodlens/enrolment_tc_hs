<template>
    <div>
        <div class="section">

            <div class="columns is-centered">
                <div class="column is-6-desktop is-8-tablet">

                    <div class="box">
                        <div class="box-header">
                            <div class="box-header-text">
                                PATIENT MEDICATIONS
                            </div>
                        </div>

                        <div class="box-body">
                            <div v-for="(item, index) in patient_medications" :key="index">
                                <div class="divider"></div>

                                <div class="columns">
                                    <div class="column">
                                        <b-field label="Date/Time">
                                            <b-datetimepicker
                                                placeholder="Date/Time"
                                                v-model="item.datetime_created">
                                            </b-datetimepicker>
                                        </b-field>
                                    </div>
                                </div>


                                <div class="columns">
                                    <div class="column">
                                        <b-field label="Doctor Order">
                                            <b-select
                                                placeholder="Doctor Order"
                                                v-model="item.doctor_order">
                                                <option v-for="(item, index) in doctor_orders" :key="index"
                                                        :value="item.order">{{ item.order }}</option>
                                            </b-select>
                                        </b-field>
                                    </div>
                                </div>

                                <div class="columns">
                                    <div class="column">
                                        <b-field label="Medication">
                                            <b-input type="text"
                                                     placeholder="Focus"
                                                     v-model="item.medication">
                                            </b-input>
                                        </b-field>
                                    </div>
                                </div>

                                <div class="columns">
                                    <div class="column">
                                        <b-field label="Remarks">
                                            <b-input type="text"
                                                     placeholder="Focus"
                                                     v-model="item.remarks">
                                            </b-input>
                                        </b-field>
                                    </div>
                                </div>

                                <b-button class="is-small"
                                          @click="remove(index)"
                                          icon-right="delete"
                                          type="is-danger">
                                </b-button>
                                <div class="divider"></div>
                            </div> <!--loop  -->

                            <div class="buttons is-right">
                                <b-button class="is-small"
                                          @click="add"
                                          icon-right="plus"
                                          type="is-primary">
                                </b-button>
                            </div>

                            <div class="buttons is-right">
                                <b-button class=""
                                          @click="submit"
                                          label="Save Medication"
                                          type="is-primary"></b-button>
                            </div>
                        </div> <!--box -body -->
                    </div> <!--box-->
                </div> <!--col-->
            </div><!--cols-->
        </div><!--section-->
    </div> <!--root-->
</template>

<script>


export default{
    props: ['propPatientAdmissionId', 'propPatientId'],

    data(){
        return {
            fields: {},
            errors: {},

            patient_medications: [],
            doctor_orders: [],

        }
    },

    methods: {

        add(){
            this.patient_medications.push({
                doctor_order: '',
                patient_medication_id: 0,
                datetime_created: new Date(),
                medication: '',
                remarks: '',
            })
        },
        remove(index){
            this.patient_medications.splice(index, 1);
        },

        getDoctorOrders(){
            axios.get(`/get-doctor-orders-for-patient/${this.propPatientAdmissionId}/${this.propPatientId}`)
                .then(res=>{
                    this.doctor_orders = res.data
                })
        },

        submit(){
            this.fields = [];
            // this.fields.patient_id = this.propPatientId;
            //this.fields.patient_admission_id = this.propPatientAdmissionId;

            this.patient_medications.forEach(el =>{
                this.fields.push({
                    patient_medication_id: el.patient_medication_id,
                    doctor_order: el.doctor_order,
                    patient_admission_id: this.propPatientAdmissionId,
                    patient_id: this.propPatientId,
                    datetime_created: this.formatDateAndTime(el.datetime_created),
                    medication: el.medication,
                    remarks: el.remarks,
                });
            })

            axios.post('/nurse-patient-medication-submit', this.fields).then(res=>{
                if(res.data.status === 'saved'){
                    this.$buefy.dialog.alert({
                        title: 'SAVED!',
                        message: 'Successfully saved.',
                        type: 'is-success',
                        confirmText: 'OK',
                        onConfirm: () => {
                            window.location = '/nurse-patient'
                        }
                    })
                }
            }).catch(err=>{

            })
        },

        checkIfHaveData(){
            axios.get(`/get-patient-medications/${this.propPatientAdmissionId}/${this.propPatientId}`)
                .then(res=>{
                    this.patient_medications = []

                    res.data.forEach(el=>{

                        this.patient_medications.push({
                            doctor_order: el.doctor_order,
                            patient_medication_id: el.patient_medication_id,
                            datetime_created: new Date(el.datetime_created),
                            medication: el.medication,
                            remarks: el.remarks,
                        })
                    })
                })
        },


        formatDateAndTime(value){
            let myDate = new Date(value)

            let realDate =
                myDate.getFullYear() +
                "-" +
                ("0" + (myDate.getMonth() + 1)).slice(-2) +
                "-" +
                ("0" + myDate.getDate()).slice(-2);

            let realTime =
                myDate.getHours() +
                ':' +
                ('0' + myDate.getMinutes()).slice(-2) +
                ':' +
                ('0' + myDate.getSeconds()).slice(-2);


            let timeString = realTime;
            let H = +timeString.substr(0, 2);
            let h = (H % 12) || 12;
            let ampm = H < 12 ? " AM" : " PM";
            timeString = h + timeString.substr(2, 3) + ampm;

            return realDate + ' ' + realTime
        }
    },

    mounted(){
        this.getDoctorOrders()
        this.checkIfHaveData()
    }
}
</script>