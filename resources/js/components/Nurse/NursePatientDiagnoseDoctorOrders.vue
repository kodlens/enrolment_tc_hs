<template>
    <div>
        <div class="section">
            <div class="columns is-centered">
                <div class="column is-10">
                    <div class="form-diagnose">
                        <div class="box">
                            <div class="box-heading">
                                <div class="box-text">
                                    Doctor Order
                                </div>
                                <div class="box-body">
                                    <div v-if="data.patient">
                                        <div>
                                            Name: {{ data.patient.fname }} {{ data.patient.mname }} {{ data.patient.lname }}
                                        </div>
                                        <div>
                                            Date Order: {{ data.date_order_created }} 
                                        </div>
                                    </div>
                                    <table class="table">
                                        <tr>
                                            <th>Progress Notes</th>
                                            <th>Order</th>
                                            <th>C</th>
                                            <th>A</th>
                                            <th>R</th>
                                            <th>E</th>
                                            <th>D</th>
                                            <th>Time Posted Signature</th>
                                            <th>Nurse</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr v-for="(item, index) in data.doctor_order_details" :key="index">
                                            <td>{{ item.progress_notes }}</td>
                                            <td>{{ item.order }}</td>
                                            <td>
                                                <b-checkbox v-model="item.letter_c"
                                                    true-value="1"
                                                    false-value="0">
                                                </b-checkbox>
                                            </td>
                                            <td>
                                                <b-checkbox v-model="item.letter_a"
                                                    true-value="1"
                                                    false-value="0">
                                                </b-checkbox>
                                            </td>
                                            <td>
                                                <b-checkbox v-model="item.letter_r"
                                                    true-value="1"
                                                    false-value="0">
                                                </b-checkbox>
                                            </td>
                                            <td>
                                                <b-checkbox v-model="item.letter_e"
                                                    true-value="1"
                                                    false-value="0">
                                                </b-checkbox>
                                            </td>
                                            <td>
                                                <b-checkbox v-model="item.letter_d"
                                                    true-value="1"
                                                    false-value="0">
                                                </b-checkbox>
                                            </td>
                                            <td>
                                                {{ item.nurse_date_time_execute }}
                                            </td>
                                            <td>
                                                <span v-if="item.nurse">{{ item.nurse.fname }} {{ item.nurse.mname }} {{  item.nurse.lname }}</span>
                                                
                                            </td>
                                            <td>
                                                <button class="is-small button is-primary" @click="submitNurseOrder(item)">Ok</button>
                                            </td>
                                        </tr>
                                    </table>
                                    
                                </div>
                            </div>
                        </div><!--box--> 
                    </div>
                </div>
            </div>
        </div>
    </div> <!--root div -->

</template>

<script>

export default {
    props: ['propPatientDiagnoseId'],
    data(){
        return{
            data: [],

            patient_diagnose_id: 0,

            fields: {
                patient_diagnose_id: 0,
                patient_id: 0,
                orders: [],
                medications: [],
            }
        }
    },

    methods: {
        initData(){
            this.patient_diagnose_id = this.propPatientDiagnoseId
        },

        getDoctorOrder(){
            axios.get('/get-nurse-patient-diagnose-doctor-orders/'+ this.propPatientDiagnoseId).then(res=>{
                this.data = res.data
                console.log(this.data)
            }).catch(err=>{
            
            })
        },

        submitNurseOrder(item){
            axios.post('/nurse-patient-diagnose-doctor-orders-detail-update/' + item.doctor_order_detail_id, item).then(res=>{
                if(res.data.status === 'updated'){
                    this.$buefy.toast.open({
                        message: 'Doctor order updated!',
                        type: 'is-success'
                    })
                    
                    this.getDoctorOrder()
                }
            }).catch(err=>{
            
            })
        },


        submit: function(){
            axios.post('/doctor-patient-diagnose-submit', this.fields).then(res=>{
                if(res.data.status === 'saved'){
                    this.$buefy.dialog.alert({
                        title: 'Saved!',
                        message: 'Successfully saved.',
                        type: 'is-success',
                        onConfirm: () => {
                           window.location = '/doctor-patients'
                        }
                    })
                }
            }).catch(err=>{
            
            })
        },

        assignDefault(){
            this.fields = {
                patient_diagnose_id: this.data.patient_diagnose_id,
                patient_id: this.data.patient.patient_id,
                orders: [],
                medications: [],
            }
        }
    },

    created(){
        this.initData()
    },

    mounted() {
        console.log(this.data);
        this.getDoctorOrder()
    }
}
</script>

<style scoped>
    .form-diagnose{
        padding: 25px;
    }
</style>