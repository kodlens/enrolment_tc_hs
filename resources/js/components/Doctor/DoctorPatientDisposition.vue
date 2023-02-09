<template>
    <div>
        <div class="section">

            <div class="columns is-centered">
                <div class="column is-6-desktop is-8-tablet">

                    <div class="box">
                        <div class="box-header">
                            <div class="box-header-text">
                                DISCHARGE PATIENT
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column">
                                <b-field label="Discharge Date">
                                    <b-datetimepicker
                                         placeholder="Discharge Date"
                                         v-model="fields.discharge_date"
                                        required>
                                    </b-datetimepicker>
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
                                <b-field label="Laboratory Findings">
                                    <b-input type="textarea"
                                             placeholder="Laboratory Findings"
                                             v-model="fields.laboratory_findings">
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
                                <b-field label="Disposition (Home medication, special instructions)">
                                    <b-input type="textarea"
                                             placeholder="Disposition (Home medication, special instructions)"
                                             v-model="fields.medication_disposition">
                                    </b-input>
                                </b-field>
                            </div>
                        </div>

                        <div class="divider"></div>

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
            fields: {
                discharge_date: new Date()
            },
            errors: {},

        }
    },

    methods: {
        submit(){
            this.fields.patient_id = this.propPatientId;
            this.fields.patient_admission_id = this.propPatientAdmissionId;
            this.fields.real_discharge_date = this.formatDateAndTime(this.fields.discharge_date)

            axios.post('/doctor-patient-discharge', this.fields).then(res=>{
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
            axios.get(`/get-patient-doctor-to-discharge/${this.propPatientAdmissionId}/${this.propPatientId}`)
                .then(res=>{
                    if(res.data){
                        console.log(res.data)
                        this.fields = res.data

                        if(res.data.patient_admission.discharge_date != null){
                            this.fields.discharge_date = new Date(res.data.patient_admission.discharge_date)
                        }

                    }
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
        this.checkIfHaveDiagnose()
    }
}
</script>