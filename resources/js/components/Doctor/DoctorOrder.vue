<template>
    <div>
        <div class="section">

            <div class="columns is-centered">
                <div class="column is-6-desktop is-8-tablet">

                    <div class="box">
                        <div class="box-header">
                            <div class="box-header-text">
                                DOCTOR ORDERS
                            </div>
                        </div>

                        <div class="box-body">
                            <div v-for="(order, index) in doctor_orders" :key="index">
                                <div class="divider"></div>

                                <div class="columns">
                                    <div class="column">
                                        <b-field label="Date/Time">
                                            <b-datetimepicker
                                                placeholder="Date/Time"
                                                v-model="order.doctor_date_time_created">
                                            </b-datetimepicker>
                                        </b-field>
                                    </div>
                                </div>

                                <div class="columns">
                                    <div class="column">
                                        <b-field label="Progress Notes">
                                            <b-input type="text"
                                                placeholder="Progress Notes"
                                                v-model="order.progress_notes">
                                            </b-input>
                                        </b-field>
                                    </div>
                                </div>

                                <div class="columns">
                                    <div class="column">
                                        <b-field label="Order">
                                            <b-input type="textarea"
                                                placeholder="Order"
                                                v-model="order.order">
                                            </b-input>
                                        </b-field>
                                    </div>
                                </div>

                                <div class="columns">
                                    <div class="column">
                                        <b-field>
                                            <b-field label="C">
                                                <b-checkbox v-model="order.letter_c"
                                                            true-value="1"
                                                            false-value="0">
                                                </b-checkbox>
                                            </b-field>
                                            <b-field label="A">
                                                <b-checkbox v-model="order.letter_a"
                                                            true-value="1"
                                                            false-value="0">
                                                </b-checkbox>
                                            </b-field>
                                            <b-field label="R">
                                                <b-checkbox v-model="order.letter_r"
                                                            true-value="1"
                                                            false-value="0">
                                                </b-checkbox>
                                            </b-field>
                                            <b-field label="E">
                                                <b-checkbox v-model="order.letter_e"
                                                            true-value="1"
                                                            false-value="0">
                                                </b-checkbox>
                                            </b-field>
                                            <b-field label="D">
                                                <b-checkbox v-model="order.letter_d"
                                                            true-value="1"
                                                            false-value="0">
                                                </b-checkbox>
                                            </b-field>
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
                                    label="Save Order"
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

            doctor_orders: []

        }
    },

    methods: {

        addOrder(){
            this.doctor_orders.push({
                doctor_order_id: 0,
                doctor_date_time_created: new Date(),
                progress_notes: '',
                order: '',
                letter_c: 0,
                letter_a: 0,
                letter_r: 0,
                letter_e: 0,
                letter_d: 0,
            })
        },
        removeOrder(index){

          

            if(this.doctor_orders[index].doctor_order_id > 0){
                let id = this.doctor_orders[index].doctor_order_id;

                axios.delete('/doctor-orders-delete/' + id).then(res=>{
                    this.$buefy.toast.open({
                        message: 'Order removed',
                        type: 'is-success'
                    })
                })
            }
            this.doctor_orders.splice(index, 1);
        },

        submit(){
            this.fields = [];
           // this.fields.patient_id = this.propPatientId;
            //this.fields.patient_admission_id = this.propPatientAdmissionId;

            this.doctor_orders.forEach(el =>{
                this.fields.push({
                    doctor_order_id: el.doctor_order_id,
                    patient_admission_id: this.propPatientAdmissionId,
                    patient_id: this.propPatientId,
                    doctor_date_time_created: this.formatDateAndTime(el.doctor_date_time_created),
                    progress_notes: el.progress_notes,
                    order: el.order,
                    letter_c: el.letter_c,
                    letter_a: el.letter_a,
                    letter_r: el.letter_r,
                    letter_e: el.letter_e,
                    letter_d: el.letter_d,
                });
            })

            axios.post('/doctor-orders-submit', this.fields).then(res=>{
                if(res.data.status === 'saved'){
                    this.$buefy.dialog.alert({
                        title: 'SAVED!',
                        message: 'Successfully saved.',
                        type: 'is-success',
                        confirmText: 'OK',
                        onConfirm: () => {
                            window.location = '/doctor-patients'
                        }
                    })
                }
            }).catch(err=>{

            })
        },

        checkIfHaveData(){
            axios.get(`/get-patient-doctor-orders/${this.propPatientAdmissionId}/${this.propPatientId}`)
                .then(res=>{
                    this.doctor_orders = []

                    res.data.forEach(el=>{

                        this.doctor_orders.push({
                            doctor_order_id: el.doctor_order_id,
                            doctor_date_time_created: new Date(el.doctor_date_time_created),
                            progress_notes: el.progress_notes,
                            order: el.order,
                            letter_c: el.letter_c,
                            letter_a: el.letter_a,
                            letter_r: el.letter_r,
                            letter_e: el.letter_e,
                            letter_d: el.letter_d,
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
        this.checkIfHaveData()
    }
}
</script>