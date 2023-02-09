<template>
    <div>
        <div class="section">
            <div class="columns is-centered">
                <div class="column is-6-desktop is-8-tablet">
                    <div class="box">
                        <div class="box-header">
                            <div class="box-header-text">
                                Physical Exam
                            </div>
                        </div>

                        <div class="box-body">

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
                                    <b-field label="HEAD-EENT">
                                        <b-input type="textarea"
                                                 placeholder="HEAD-EENT"
                                                 v-model="fields.head_eent"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Lymp Notes">
                                        <b-input type="textarea"
                                                 placeholder="Lymp Notes"
                                                 v-model="fields.lymp_notes"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Chest">
                                        <b-input type="textarea"
                                                 placeholder="Chest"
                                                 v-model="fields.chest"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Lungs">
                                        <b-input type="textarea"
                                                 placeholder="Lungs"
                                                 v-model="fields.lungs"></b-input>
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
                                    <b-field label="Breast">
                                        <b-input type="textarea"
                                                 placeholder="Breast"
                                                 v-model="fields.breast"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Abdomen">
                                        <b-input type="textarea"
                                                 placeholder="Abdomen"
                                                 v-model="fields.abdomen"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Rectum">
                                        <b-input type="textarea"
                                                 placeholder="Rectum"
                                                 v-model="fields.rectum"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Genitalia">
                                        <b-input type="textarea"
                                                 placeholder="Genitalia"
                                                 v-model="fields.genitalia"></b-input>
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

            axios.post('/doctor-patient-physical-exam', this.fields)
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
            axios.get(`/get-patient-physical-exam-by-admission-and-patient/${this.propPatientAdmissionId}/${this.propPatientId}`)
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