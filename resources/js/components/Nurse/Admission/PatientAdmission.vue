<template>
    <div>
        <div class="columns">
            <div class="column">
                <b-field label="Admission(Date and Time)" expanded
                    :type="this.errors.admission_date ? 'is-danger':''"
                    :message="this.errors.admission_date ? this.errors.admission_date[0] : ''">
                    <b-datetimepicker expanded
                        v-model="admission_date"
                        placeholder="Admission">
                    </b-datetimepicker>
                    <p class="controls">
                        <b-button
                            label="Clear"
                            type="is-danger"
                            icon-left="close"
                            outlined
                            @click="admission_date = null" />
                    </p>
                </b-field>

            </div>
            <div class="column">
                <b-field label="Discharge(Date and Time)" expanded>
                    <b-datetimepicker
                        v-model="discharge_date" expanded
                        placeholder="Discharge"></b-datetimepicker>
                    <p class="controls">
                        <b-button
                            label="Clear"
                            type="is-danger"
                            icon-left="close"
                            outlined
                            @click="discharge_date = null" />
                    </p>
                </b-field>
            </div>
           
        </div>

        <div class="columns">
            <div class="column">
                <b-field label="Total No. of Days">
                    <b-numberinput
                        v-model="fields.total_day"
                        placeholder="Total No. of Days"
                        :controls="false"></b-numberinput>
                </b-field>
            </div>

            <div class="column">
                <b-field label="Ward/Room/Bed/Service">
                    <b-input type="text"
                        v-model="fields.ward_room" placeholder="Ward/Room/Bed/Service"></b-input>
                </b-field>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <b-field label="Admitting Physician">
                    <b-input type="text"
                        v-model="fields.admitting_physician"
                        placeholder="Admitting Physician"></b-input>
                </b-field>
            </div>
        </div>


        <div class="columns">
            <div class="column">
                <b-field label="Admitting Clerk">
                    <b-input type="text"
                             v-model="fields.admitting_clerk"
                             placeholder="Admitting Clerk"></b-input>
                </b-field>

            </div>
            <div class="column">
                <b-field label="Attending Physician">
                    <b-input type="text"
                             v-model="fields.attending_physician"
                             placeholder="Attending Physician"></b-input>
                </b-field>

            </div>
        </div>

        <div class="divider"></div>

        <div class="columns">
            <div class="column">
                <b-field label="Referred By(Physician/Agency)">
                    <b-input v-model="fields.referred_by"
                             placeholder="Referred By">
                    </b-input>
                </b-field>
            </div>

            <div class="column">
                <b-field label="Social Service Classification" expanded>
                    <b-select v-model="fields.social_service_classification" expanded>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C1</option>
                        <option value="C2">C2</option>
                        <option value="C3">C3</option>
                        <option value="D">D</option>
                    </b-select>
                </b-field>
            </div>
        </div>


        <div class="columns">
            <div class="column">
                <b-field label="Allergic To">
                    <b-input v-model="fields.allergic_to"
                             placeholder="Allergic To">
                    </b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="Hospitalization/Company/Industrial Plan Name">
                    <b-input v-model="fields.hospitalization_name"
                             placeholder="Allergic To">
                    </b-input>
                </b-field>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <b-field label="Health Insurrance Name">
                    <b-input v-model="fields.health_inssurance"
                             placeholder="Health Insurrance Name">
                    </b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="PHIC">
                    <b-select v-model="fields.phic"
                              placeholder="PHIC">
                        <option value="SSS">SSS</option>
                        <option value="GSIS">GSIS</option>
                        <option value="SSS DEPENDENT">SSS DEPENDENT</option>
                        <option value="GSIS DEPENDENT">GSIS DEPENDENT</option>
                    </b-select>
                </b-field>
            </div>
        </div>


        <div class="columns">
            <div class="column">
                <b-field label="Data furnished by">
                    <b-input v-model="fields.data_furnished_by"
                             placeholder="Data furnished by">
                    </b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="Address of informant">
                    <b-input v-model="fields.address_informant"
                             placeholder="Address of informant">
                    </b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="Relation to patient">
                    <b-input v-model="fields.patient_relation"
                             placeholder="Relation to patient">
                    </b-input>
                </b-field>
            </div>
        </div>


        <div class="columns">
            <div class="column">
                <b-field label="Admission Diagnosis">
                    <b-input v-model="fields.admission_diagnosis"
                             placeholder="Admission Diagnosis">
                    </b-input>
                </b-field>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <b-field label="BP">
                    <b-input v-model="fields.bp"
                             placeholder="BP">
                    </b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="CR">
                    <b-input v-model="fields.cr"
                             placeholder="CR">
                    </b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="RR">
                    <b-input v-model="fields.rr"
                             placeholder="RR">
                    </b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="Temp">
                    <b-input v-model="fields.temp"
                             placeholder="Temp">
                    </b-input>
                </b-field>
            </div>
        </div>

        <div class="buttons is-right">
            <b-button label="Save information" 
                icon-right="save"
                @click="submit"
                type="is-primary"></b-button>
        </div>
    </div> <!-- root dir -->
</template>

<script>
export default{


    props: {
        propPatient:{
            type: Object,
            default: {}
        }
    },
    data(){

        return{

            admission_date: null,
            discharge_date: null,

            patient: {},

            fields: {},
            errors: {},
        }
    },

    methods:{
        receiveData(patient){
            this.patient = patient
            console.log('From Nurse Info' + patient)
        },


        submit: function(){
            this.fields.patient_id = this.propPatient.patient_id;
           
            this.fields.admission_date = this.admission_date ? this.formatDateTime(this.admission_date) : '';
            this.fields.discharge_date = this.discharge_date ? this.formatDateTime(this.discharge_date) : '';
            this.fields.admission_type = this.propPatient.admission_type;

            axios.post('/patient-admission', this.fields).then(res=>{
                if(res.data.status === 'saved'){
                    this.$buefy.dialog.alert({
                        title: 'SAVED!',
                        message: 'Successfully saved.',
                        type: 'is-success',
                        confirmText: 'OK',
                        onConfirm: () => {
                            window.location = '/nurse-home';
                        }
                    })
                }
            }).catch(err=>{
                if(err.response.status === 422){
                    this.errors = err.response.data.errors;
                }
            })
        },

        formatDateTime(value){
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


            return realDate + ' ' + realTime;
        }

        

    }
}
</script>
