<template>
    <div>
        <div class="section">
            <div class="columns is-centered">
                <div class="column is-8-desktop">
                    
                    <div class="box">
                        <div class="box-header">
                            <div class="box-header-text">
                                History
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="columns">
                                <div class="column">
                                    <b-field label="General Data & Patient Profile">
                                        <b-input type="textarea"
                                            placeholder="General Data & Patient Profile"
                                            v-model="fields.general_data"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Present Complaint">
                                        <b-input type="textarea"
                                            placeholder="Present Complaint"
                                            v-model="fields.present_complain"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Past History (Previous illnesses and operations)">
                                        <b-input type="textarea"
                                            placeholder="Past History (Previous illnesses and operations)"
                                            v-model="fields.past_history"></b-input>
                                    </b-field>
                                </div>
                            </div>
    
                            <div class="columns">
                                <div class="column">
                                    <b-field label="Family History">
                                        <b-input type="textarea"
                                            placeholder="Family History"
                                            v-model="fields.family_history"></b-input>
                                    </b-field>
                                </div>
                            </div>
    
                            <hr>
                            <div class="columns">
                                <div class="column">
                                    <b-field label="Occupation and Environment">
                                        <b-input type="textarea"
                                            placeholder="Occupation and Environment"
                                            v-model="fields.occupation_environment"></b-input>
                                    </b-field>
                                </div>
                                
                                <div class="column">

                                    <div class="columns">
                                        <div class="column">
                                            <b-field label="Alcohol">
                                                <b-input type="text"
                                                    placeholder="Alcohol"
                                                    v-model="fields.alcohol"></b-input>
                                            </b-field>
                                        </div>
                                    </div>
                                    <div class="columns">
                                        <div class="column">
                                            <b-field label="Tobacco">
                                                <b-input type="text"
                                                    placeholder="Tobacco"
                                                    v-model="fields.tobacco"></b-input>
                                            </b-field>
                                        </div>
                                    </div>
                                    <div class="columns">
                                        <div class="column">
                                            <b-field label="Drug Allergies">
                                                <b-input type="text"
                                                    placeholder="Drug Allergies"
                                                    v-model="fields.drug_allergies"></b-input>
                                            </b-field>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Drug Therapy">
                                        <b-input type="textarea"
                                            placeholder="Drug Therapy"
                                            v-model="fields.other_allergies"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="divider"></div>

                            <div class="buttons is-right">
                                <b-button
                                    label="Save"
                                    @click="submit"
                                    type="is-primary"></b-button>
                            </div>
                        </div> <!--box-->


                    </div>
                </div><!--col-->
            </div><!--cols-->
        </div>
    </div>
</template>

<script>

export default{
    props: ['propPatientAdmissionId', 'propPatientId'],
    data(){
        return {
            fields: {},
            errors: {},

            history_id: 0,
        }
    },
    methods: {
        submit: function(){

            this.fields.patient_id = this.propPatientId;
            this.fields.patient_admission_id = this.propPatientAdmissionId;

            axios.post('/doctor-patient-history', this.fields).then(res=>{
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
            axios.get(`/get-patient-history-by-admission-and-patient/${this.propPatientAdmissionId}/${this.propPatientId}`)
                .then(res=>{
                    if(res.data){
                        this.fields = res.data
                    }
                })
        }
    }, 

    mounted(){
        this.checkIfHaveData()
    }
}
</script>

<style scoped>

    .box-header-text{
        font-weight: bold;
        font-size: 1.2em;
        margin: 10px 0;
    }

</style>