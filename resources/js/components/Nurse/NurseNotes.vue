<template>
    <div>
        <div class="section">

            <div class="columns is-centered">
                <div class="column is-6-desktop is-8-tablet">

                    <div class="box">
                        <div class="box-header">
                            <div class="box-header-text">
                                NURSE NOTES
                            </div>
                        </div>

                        <div class="box-body">
                            <div v-for="(item, index) in nurse_notes" :key="index">
                                <div class="divider"></div>

                                <div class="columns">
                                    <div class="column">
                                        <b-field label="Date/Time">
                                            <b-datetimepicker
                                                placeholder="Date/Time"
                                                v-model="item.date_time_created">
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
                                        <b-field label="Focus">
                                            <b-input type="text"
                                                     placeholder="Focus"
                                                     v-model="item.focus">
                                            </b-input>
                                        </b-field>
                                    </div>
                                </div>

                                <div class="columns">
                                    <div class="column">
                                        <b-field label="Nurse Notes (Data, Action, Response)">
                                            <b-input type="textarea"
                                                     placeholder="Nurse Notes"
                                                     v-model="item.nurse_notes">
                                            </b-input>
                                        </b-field>
                                    </div>
                                </div>

                                <b-button class="is-small"
                                      @click="removeOrder(index)"
                                      icon-right="delete"
                                      type="is-danger">
                                </b-button>
                                <div class="divider"></div>
                            </div> <!--loop  -->

                            <div class="buttons is-right">
                                <b-button class="is-small"
                                      @click="addOrder"
                                      icon-right="plus"
                                      type="is-primary">
                                </b-button>
                            </div>

                            <div class="buttons is-right">
                                <b-button class=""
                                      @click="submit"
                                      label="Save Notes"
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

            nurse_notes: [],
            doctor_orders: [],

        }
    },

    methods: {

        addOrder(){
            this.nurse_notes.push({
                nurse_note_id: 0,
                date_time_created: new Date(),
                focus: '',
                nurse_notes: '',
            })
        },
        removeOrder(index){
            this.nurse_notes.splice(index, 1);
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

            this.nurse_notes.forEach(el =>{
                this.fields.push({
                    nurse_note_id: el.nurse_note_id,
                    doctor_order: el.doctor_order,
                    patient_admission_id: this.propPatientAdmissionId,
                    patient_id: this.propPatientId,
                    date_time_created: this.formatDateAndTime(el.date_time_created),
                    focus: el.focus,
                    nurse_notes: el.nurse_notes,
                });
            })

            axios.post('/nurse-notes-submit', this.fields).then(res=>{
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
            axios.get(`/get-nurse-notes/${this.propPatientAdmissionId}/${this.propPatientId}`)
                .then(res=>{
                    this.nurse_notes = []

                    res.data.forEach(el=>{

                        this.nurse_notes.push({
                            doctor_order: el.doctor_order,
                            nurse_note_id: el.nurse_note_id,
                            date_time_created: new Date(el.date_time_created),
                            focus: el.focus,
                            nurse_notes: el.nurse_notes,
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