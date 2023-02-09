<template>
    <div>
        <div class="section">
            <div class="columns is-centered">
                <div class="column is-8">
                    <div class="form-diagnose">
                        <div class="box">
                            <div class="box-heading">
                                <div class="box-text">
                                    Patient Diagnose
                                </div>
                            </div>
                            <div class="columns is-centered">
                                <div class="column is-6">
                                    <div>
                                        <span>Patient Name: </span> {{ data.patient.lname }}, {{ data.patient.fname }} {{ data.patient.mname }}
                                    </div>
            
                                    <div>
                                        <span>Complain: </span> {{ data.present_complain }}
                                    </div>

                                    <div>
                                        <span>Admission Diagnose: </span> {{ data.admission_diagnose }}
                                    </div>

                                    <!-- <div>
                                        <span>Principal Diagnose: </span> {{ data.principal_diagnose }}
                                    </div> -->
                                </div>
                            </div>
                            

                            <div class="columns is-centered">
                                <div class="column is-6">
                                    <p class="subtitle mt-5" style="text-align: center;">Pyhsical Examination</p>
                                    <div class="columns">
                                        <div class="column">
                                            <div>
                                                Skin: {{ data.skin }}
                                            </div>
                                            <div>
                                                Head EENT: {{ data.head_eent }}
                                            </div>
                                            <div>
                                                Lymp Notes: {{ data.lymp_notes }}
                                            </div>
                                        </div>
                                        <div class="column">
                                            <div>
                                                Chest: {{ data.chest }}
                                            </div>
                                            <div>
                                                Lungs: {{ data.lungs }}
                                            </div>
                                            <div>
                                                Cardiovascular: {{ data.cardiovascular }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="columns">
                                        <div class="column">
                                            <div>
                                                Breast: {{ data.breast }}
                                            </div>
                                            <div>
                                                Abdoment: {{ data.abdoment }}
                                            </div>
                                            <div>
                                                Rectum: {{ data.rectum }}
                                            </div>
                                        </div>
                                        <div class="column">
                                            <div>
                                                Genetalia: {{ data.genetalia }}
                                            </div>
                                            <div>
                                                Musculoskeletal: {{ data.musculoskeletal }}
                                            </div>
                                            <div>
                                                Extremities: {{ data.extremities }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="columns">
                                        <div class="column">
                                            <div>
                                                Neurological: {{ data.neurological }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--box-->

                        <div class="box">
                            <div class="box-heading">
                                <div class="box-text">
                                    Create Order
                                </div>
                            </div>
                            <div class="box-body">
                                <div v-for="(item, ix1) in fields.orders" :key="ix1">
                                    <div class="buttons is-right">
                                        <b-button type="is-danger" 
                                            class="is-small mt-5" 
                                            label="X"
                                            @click="removeOrder(ix1)"
                                        ></b-button>
                                    </div>
                                    
                                    <b-field label="Progress Note" label-position="on-border">
                                        <b-input type="text" v-model="item.progress_notes"
                                            placeholder="Progress Notes"
                                        ></b-input>
                                    </b-field>
                                    <b-field label="Order" label-position="on-border">
                                        <b-input type="text" v-model="item.order"
                                            placeholder="Order"
                                        ></b-input>
                                    </b-field>
                            
                                    <hr>
                                </div>
                                
                                <div class="buttons">
                                    <b-button type="is-primary" 
                                        class="is-small mt-5" 
                                        label="Add Order"
                                        @click="addOrder"
                                    ></b-button>
                                </div>
                            </div> <!--box body -->
                        </div><!--box-->

                        <div class="box">
                            <div class="box-heading">
                                <div class="box-text">
                                    Create Medication
                                </div>
                            </div>

                            <div v-for="(item, ix2) in fields.medications" :key="ix2">
                                <div class="buttons is-right">
                                    <b-button type="is-danger" 
                                        class="is-small mt-5" 
                                        label="X"
                                        @click="removeMedication(ix2)"
                                    ></b-button>
                                </div>
                                
                                <b-field label="Name of Drugs" label-position="on-border">
                                    <b-input type="text" v-model="item.name_of_drugs"
                                        placeholder="Name of Drugs"
                                    ></b-input>
                                </b-field>
                                <b-field label="Instruction" label-position="on-border">
                                    <b-input type="text" v-model="item.instruction"
                                        placeholder="Instruction"
                                    ></b-input>
                                </b-field>
                        
                                <hr>
                            </div>
                            
                            <div class="buttons">
                                <b-button type="is-primary" 
                                    class="is-small mt-5" 
                                    label="Add Medication"
                                    @click="addMedication"
                                ></b-button>
                            </div><!--box body-->
                        </div><!--box-->


                        <div class="box">
                            <div class="buttons is-centered">
                                <b-button type="is-primary" label="Save" @click="submit"></b-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--root div -->

</template>

<script>

export default {
    props: ['propData'],
    data(){
        return{
            data: [],

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
            this.data = JSON.parse(this.propData)
        },

        addOrder(){
            this.fields.orders.push({
                patient_id: 0,
                patient_diagnose_id: 0,
                doctor_order_id: 0,
                progress_notes: '',
                order: '',
                letter_c: 0,
                letter_a: 0,
                letter_r: 0,
                letter_e: 0,
                letter_d: 0,
            });
        },
        removeOrder(ix){
            this.fields.orders.splice(ix, 1);
        },

        addMedication(){
            this.fields.medications.push({
                doctor_medication_id: 0,
                patient_id: 0,
                patient_diagnose_id: 0,
                name_of_drugs: '',
                instruction: '',
            });
        },
        removeMedication(ix){
            this.fields.medications.splice(ix, 1);
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
        this.assignDefault()
    }
}
</script>

<style scoped>
    .form-diagnose{
        padding: 25px;
    }
</style>