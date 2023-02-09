<template>
    <div>
        <div class="section">

            <div class="columns is-centered">
                <div class="column is-8-desktop">

                    <div class="box">
                        <div class="information-container" v-if="data.patient">

                            <div class="title-header-text">PATIENT PROFILE</div>
                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Patient Name: </span> {{ data.patient.lname }}, {{ data.patient.fname }} {{ data.patient.mname }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Contact No: </span> {{ data.patient.contact_no }}
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Sex: </span> {{ data.patient.sex }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Civil Status: </span> {{ data.patient.civil_status }}
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Birthdate: </span> {{ data.patient.bdate }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Birthplace: </span> {{ data.patient.birthplace }}
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Nationality: </span> {{ data.patient.nationality }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Religion: </span> {{ data.patient.religion }}
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Occupation: </span> {{ data.patient.occupation }}
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Father: </span> {{ data.patient.father_name }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Contact No: </span> {{ data.patient.father_contact_no }}
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Mother: </span> {{ data.patient.mother_maiden_name }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Contact No: </span> {{ data.patient.mother_contact_no }}
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Spouse: </span> {{ data.patient.spouse_name }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Contact No: </span> {{ data.patient.spouse_contact_no }}
                                    </div>
                                </div>
                            </div>
                          

                        </div> <!--information container-->
                        
                    </div> <!--box-->



                    <!-- for admission -->
                    <div class="box">
                        <div class="information-container" v-if="data.patient">

                            <div class="title-header-text">ADMISSION INFORMATION</div>
                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Admission Date: </span> {{ data.admission_date }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Discharge: </span> {{ data.patient.discharge_date }}
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Ward/Room: </span> {{ data.ward_room }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Total Day: </span> {{ data.total_day }}
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Admitting Physician: </span> {{ data.admitting_physician }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Admitting Clerk: </span> {{ data.admitting_clerk }}
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Attending Physician: </span> {{ data.attending_physician }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Referred By: </span> {{ data.referred_by }}
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Social Service Classification: </span> {{ data.social_service_classification }}
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Health Insurance: </span> {{ data.health_insurance }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Phic: </span> {{ data.patient.phic }}
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Data Furnished By: </span> {{ data.data_furnished_by }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Address Informant: </span> {{ data.address_informant }}
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Patient Relation: </span> {{ data.patient_relation }}
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Admission Diagnosis: </span> {{ data.admission_diagnosis }}
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">BP: </span> {{ data.bg }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">CR: </span> {{ data.cr }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">RR: </span> {{ data.rr }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Temp: </span> {{ data.temp }}
                                    </div>
                                </div>
                            </div>
                          

                        </div> <!--information container-->
                        
                    </div> <!--box-->



                    <!-- for history -->
                    <div class="box">
                        <div class="information-container" v-if="data.patient">

                            <div class="title-header-text">HISTORY</div>
                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Present Complain: </span> {{ data.history.present_complain }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Past History: </span> {{ data.history.past_history }}
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Family History: </span> {{ data.history.family_history }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Occupation Environment: </span> 
                                        {{ data.history.occupation_environment }}
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Alcohol: </span> 
                                        {{ data.history.alcohol }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Tobacco: </span> 
                                        {{ data.history.tobacco }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Drug Allergies: </span> 
                                        {{ data.history.drug_allergies }}
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Other Allergies: </span> 
                                        {{ data.history.other_allergies }}
                                    </div>
                                </div>
                            </div>

                        </div> <!--information container-->
                        
                    </div> <!--box-->



                      <!-- for physical exam -->
                    <div class="box">
                        <div class="information-container" v-if="data.patient">

                            <div class="title-header-text">PHYSICAL EXAM</div>
                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Skin: </span> {{ data.physical_exam.skin }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Head-EENT: </span> {{ data.physical_exam.head_eent }}
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Lymp Notes: </span> {{ data.physical_exam.lymp_notes }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Chest: </span> {{ data.physical_exam.chest }}
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Lungs: </span> {{ data.physical_exam.lungs }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Cardiovascular: </span> {{ data.physical_exam.cardiovascular }}
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Breast: </span> {{ data.physical_exam.breast }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Abdomen: </span> {{ data.physical_exam.abdomen }}
                                    </div>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Rectum: </span> {{ data.physical_exam.rectum }}
                                    </div>
                                </div>
                                <div class="column">
                                    <div>
                                        <span class="field-prop">Genetalia: </span> {{ data.physical_exam.genetalia }}
                                    </div>
                                </div>
                            </div>

                        </div> <!--information container-->
                        
                    </div> <!--box-->



                    <!-- for Doctor Order -->
                    <div class="box">
                        <div class="information-container" v-if="data.patient">

                            <div class="title-header-text">DOCTOR ORDER</div>

                            <div v-for="(i, ix) in data.doctor_orders" :key="ix">
                                <div class="columns">
                                    <div class="column">
                                        <div>
                                            <span class="field-prop">Date/Time: </span> 
                                            {{ i.doctor_date_time_created }}
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div>
                                            <span class="field-prop">Progress Notes: </span> 
                                            {{ i.progress_notes }}
                                        </div>
                                    </div>
                                </div>

                                <div class="columns">
                                    <div class="column">
                                        <div>
                                            <span class="field-prop">Order: </span> 
                                            {{ i.order }}
                                        </div>
                                    </div>
                                </div>


                                <div class="columns">
                                    <div class="column">
                                        <b-field label="C">
                                            <b-checkbox v-model="i.letter_c"
                                            true-value="1"
                                            false-value="0"
                                            disabled>
                                            </b-checkbox>
                                        </b-field>
                                    </div>
                                    <div class="column">
                                        <b-field label="A">
                                            <b-checkbox v-model="i.letter_a"
                                            true-value="1"
                                            false-value="0"
                                            disabled>
                                            </b-checkbox>
                                        </b-field>
                                    </div>
                                    <div class="column">
                                        <b-field label="R">
                                            <b-checkbox v-model="i.letter_r"
                                            true-value="1"
                                            false-value="0"
                                            disabled>
                                            </b-checkbox>
                                        </b-field>
                                    </div>
                                    <div class="column">
                                        <b-field label="E">
                                            <b-checkbox v-model="i.letter_e"
                                            true-value="1"
                                            false-value="0"
                                            disabled>
                                            </b-checkbox>
                                        </b-field>
                                    </div>
                                    <div class="column">
                                        <b-field label="D">
                                            <b-checkbox v-model="i.letter_d"
                                            true-value="1"
                                            false-value="0"
                                            disabled>
                                            </b-checkbox>
                                        </b-field>
                                    </div>
                                </div>
                                
                                <div style="height: 1px; background-color: gray; margin-bottom: 10px;"></div>
                            </div> <!-- loop -->
                            
                        </div> <!--information container-->
                        
                    </div> <!--box-->



                    <!-- for Nurse Notes -->
                    <div class="box">
                        <div class="information-container" v-if="data.patient">

                            <div class="title-header-text">NURSE NOTES</div>

                            <div v-for="(ii, ixx) in data.nurse_notes" :key="ixx">
                                <div class="columns">
                                    <div class="column">
                                        <div>
                                            <span class="field-prop">Date/Time: </span> 
                                            {{ ii.date_time_created }}
                                        </div>
                                    </div>
                                    <div class="column">
                                        <div>
                                            <span class="field-prop">Doctor Order: </span> 
                                            {{ ii.doctor_order }}
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="columns">
                                    <div class="column">
                                        <div>
                                            <span class="field-prop">Focus: </span> 
                                            {{ ii.focus }}
                                        </div>
                                    </div>
                                </div>

                                <div class="columns">
                                    <div class="column">
                                        <div>
                                            <span class="field-prop">Nurse Notes: </span> 
                                            {{ ii.nurse_notes }}
                                        </div>
                                    </div>
                                </div>
                                
                                <div style="height: 1px; background-color: gray; margin-bottom: 10px;"></div>
                            </div> <!-- loop -->

                        </div>
                    </div>


                  



                </div> <!--col-->
            </div><!--cols-->
        </div><!--section -->
    </div><!--root-->
</template>

<script>
export default{

    props: ['propPatientAdmissionId', 'propPatientId'],


    data(){
        return{
            data: [],
        }
    },

    methods: {
        getPatientInformation(){
            axios.get(`/get-summary-patient/${this.propPatientAdmissionId}/${this.propPatientId}`).then(res=>{
                this.data = res.data
                console.log(res.data)
            })
        }
    },

    mounted() {
        this.getPatientInformation()
    }
}
</script>

<style scoped>

    .field-prop{
        font-weight: bold;
    }

    .title-header-text{
        font-weight: bold;
        font-size: 1.2em;
        text-align: center;
        margin-bottom: 15px;
        padding: 15px;
        border-bottom: 1px solid gray;
    }

</style>