<template>
    <div>
        <div class="section">
            <div class="columns is-centered">
                <div class="column is-6-desktop is-8-tablet">
                    <div class="box">
                        <div class="box-header">
                            <div class="box-header-text">
                                System Review
                            </div>
                        </div>

                        <div class="box-body">

                            <div class="columns">
                                <div class="column">
                                    <b-field label="General">
                                        <b-input type="textarea"
                                            placeholder="General"
                                            v-model="fields.general"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Skin">
                                        <b-input type="textarea"
                                            placeholder="Skin"
                                            v-model="fields.skin"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="EENT">
                                        <b-input type="textarea"
                                            placeholder="EENT"
                                            v-model="fields.eent"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Musculoskeletal">
                                        <b-input type="textarea"
                                            placeholder="Musculoskeletal"
                                            v-model="fields.musculoskeletal"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Respiratory">
                                        <b-input type="textarea"
                                            placeholder="Respiratory"
                                            v-model="fields.respiratory"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Cardiovascular">
                                        <b-input type="textarea"
                                            placeholder="Cardiovascular"
                                            v-model="fields.cardiovascular"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Gastrointestinal">
                                        <b-input type="textarea"
                                            placeholder="Gastrointestinal"
                                            v-model="fields.gastrointestinal"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Genitourinary">
                                        <b-input type="textarea"
                                            placeholder="Genitourinary"
                                            v-model="fields.genitourinary"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Female Reproductive">
                                        <b-input type="textarea"
                                            placeholder="Female Reproductive"
                                            v-model="fields.female_reproductive"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Nervous">
                                        <b-input type="textarea"
                                            placeholder="Female Reproductive"
                                            v-model="fields.nervous"></b-input>
                                    </b-field>
                                </div>
                            </div>


                            <div class="columns">
                                <div class="column">
                                    <b-field label="Past Disease (Include treatment and it's duration; Hospitalization and Operations)">
                                        <b-input type="textarea"
                                            placeholder="Past Disease"
                                            v-model="fields.past_disease"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="History of Cancer(Type, Site, and Treatment)">
                                        <b-input type="textarea"
                                            placeholder="History of Cancer"
                                            v-model="fields.history_cancer"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="divider"></div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="PTB">
                                        <b-select
                                            placeholder="PTB"
                                            v-model="fields.ptb">
                                        <option value="+">+</option>
                                        <option value="-">-</option>
                                        </b-select>
                                    </b-field>
                                </div>
                                <div class="column">
                                    <b-field label="Asthma">
                                        <b-select
                                            placeholder="Asthma"
                                            v-model="fields.asthma">
                                            <option value="+">+</option>
                                            <option value="-">-</option>
                                        </b-select>
                                    </b-field>
                                </div>
                                <div class="column">
                                    <b-field label="Cancer">
                                        <b-select
                                            placeholder="Cancer"
                                            v-model="fields.cancer">
                                            <option value="+">+</option>
                                            <option value="-">-</option>
                                        </b-select>
                                    </b-field>
                                </div>
                            </div>

                            <div class="divider"></div>

                            <div class="buttons is-right">
                                <b-button
                                    @click="submit"
                                    label="Save"
                                    type="is-primary"></b-button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default{

    props: ['propPatientAdmissionId','propPatientId'],

    data(){
        return {
            fields:{},
            errors: {},

        }
    },

    methods: {
        
        submit: function(){

            this.fields.patient_id = this.propPatientId;
            this.fields.patient_admission_id = this.propPatientAdmissionId;

            axios.post('/doctor-patient-system-review', this.fields)
                .then(res=>{
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
            axios.get(`/get-patient-system-review-by-admission-and-patient/${this.propPatientAdmissionId}/${this.propPatientId}`)
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