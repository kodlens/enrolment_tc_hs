<template>
    <div>
        <div class="section">

            <div class="columns is-centered">
                <div class="column is-6-desktop is-8-tablet">
                    
                    <div class="box">
                        <div class="box-header">
                            <div class="box-header-text">
                                PATIENT ADMISSION
                            </div>
        
                            <div class="box-body">
                                <div class="columns">
                                    <div class="column">
                                        <b-field label="Admission Diagnosis">
                                            <b-input type="textarea"
                                                placeholder="Admission Diagnosis"
                                                v-model="fields.admission_diagnosis">
                                            </b-input>
                                        </b-field>
                                    </div>
                                </div>
        
                                <div class="columns">
                                    <div class="column">
                                        <b-field label="Principal Diagnosis">
                                            <b-input type="textarea"
                                                placeholder="Principal Diagnosis"
                                                v-model="fields.principal_diagnosis">
                                            </b-input>
                                        </b-field>
                                    </div>
                                </div>
                                <div class="columns">
                                    <div class="column">
                                        <b-field label="Other Diagnosis">
                                            <b-input type="textarea"
                                                placeholder="Other Diagnosis"
                                                v-model="fields.other_diagnosis">
                                            </b-input>
                                        </b-field>
                                    </div>
                                </div>
                                <div class="columns">
                                    <div class="column">
                                        <b-field label="ICD Code No.">
                                            <b-input type="text"
                                                placeholder="ICD Code No."
                                                v-model="fields.icd_code_no">
                                            </b-input>
                                        </b-field>
                                    </div>
                                </div>

                                <div class="divider"></div>
        
                                <div class="columns">
                                    <div class="column">
                                        <b-field label="Principal Operation Procedure">
                                            <b-input type="textarea"
                                                placeholder="Principal Operation Procedure"
                                                v-model="fields.principal_operation_procedure">
                                            </b-input>
                                        </b-field>
                                    </div>
                                </div>

                                <div class="columns">
                                    <div class="column">
                                        <b-field label="Other Principal Operation Procedure">
                                            <b-input type="textarea"
                                                placeholder="Other Principal Operation Procedure"
                                                v-model="fields.other_principal_operation_procedure">
                                            </b-input>
                                        </b-field>
                                    </div>
                                </div>

                                <div class="columns">
                                    <div class="column">
                                        <b-field label="Accident/Injuries/Poisoning (E code)">
                                            <b-input type="textarea"
                                                placeholder="Accident/Injuries/Poisoning (E code)"
                                                v-model="fields.accident_injuries">
                                            </b-input>
                                        </b-field>
                                    </div>
                                </div>

                                <div class="columns">
                                    <div class="column">
                                        <b-field label="Place of Occurence">
                                            <b-input type="text"
                                                placeholder="Place of Occurence"
                                                v-model="fields.place_occurence">
                                            </b-input>
                                        </b-field>
                                    </div>
                                </div>

                                <div class="columns">
                                    <div class="column">
                                        <b-field label="Disposition" expanded>
                                            <b-select expanded
                                                placeholder="Disposition"
                                                v-model="fields.disposition">
                                                <option value="Discharge">Discharge</option>
                                                <option value="Transfered">Transfered</option>
                                                <option value="Dama">Dama</option>
                                                <option value="Absconded">Absconded</option>
                                            </b-select>
                                        </b-field>
                                    </div>

                                    <div class="column">
                                        <b-field label="Results" expanded>
                                            <b-select expanded
                                                placeholder="Results"
                                                v-model="fields.result">
                                                <option value="Recovered">Recovered</option>
                                                <option value="Improved">Improved</option>
                                                <option value="Unimproved">Unimproved</option>
                                                <option value="Died">Died</option>
                                                <option value="-48 Hours">-48 Hours</option>
                                                <option value="+48 Hours">+48 Hours</option>
                                                <option value="Autopsy">Autopsy</option>
                                                <option value="No Autopsy">No Autopsy</option>
                                            </b-select>
                                        </b-field>
                                    </div>
                                </div>

                                <div class="divider"></div>

                                <div class="buttons is-right">
                                    <b-button 
                                        @click="submit"
                                        label="Save"
                                        type="is-primary"
                                        ></b-button>
                                </div>

                            </div> <!-- box body -->
                        </div> <!--box -header -->
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
        }
    },

    methods: {
        submit(){
            this.fields.patient_id = this.propPatientId;
            this.fields.patient_admission_id = this.propPatientAdmissionId;

            axios.post('/doctor-patient-diagnose', this.fields).then(res=>{
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

        checkIfHaveDiagnose(){
            axios.get(`/get-patient-diagnose-by-admission-and-patient/${this.propPatientAdmissionId}/${this.propPatientId}`)
                .then(res=>{
                    if(res.data){
                        this.fields = res.data
                    }
                })
        }
    },

    mounted(){
        this.checkIfHaveDiagnose()
    }
}
</script>