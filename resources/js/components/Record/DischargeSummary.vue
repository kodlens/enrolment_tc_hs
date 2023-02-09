<template>
    <div>
        <div class="section">
            
            <div class="columns is-centered">
                <div class="column">
                    <div class="box printarea">
                        
                        <div class="discharge-summary-text">
                            DISCHARGE SUMMARY
                        </div>

                        <div class="line-form">
                            <div>
                                <span class="form-attr">Surname:</span> {{ patient.patient.lname }}
                            </div>
                            <div>
                                <span class="form-attr">Given Name:</span> {{ patient.patient.fname }}
                            </div>
                            <div>
                                <span class="form-attr">Middle Name:</span> {{ patient.patient.mname }}
                            </div>
                        </div>

                        <div class="line-form">
                            <div>
                                <span class="form-attr">Age:</span> {{ patient.patient.age }}
                            </div>
                            <div>
                                <span class="form-attr">Sex:</span> {{ patient.patient.sex }}
                            </div>
                            <div>
                                <span class="form-attr">Admission ref:</span> {{ patient.patient_admission_id }}
                            </div>
                        </div>

                        <div class="line-form">
                            <div>
                                <span class="form-attr">Ward/Room:</span> {{ patient.ward_room }}
                            </div>
                        </div>

                        <div class="line-form">
                            <div>
                                <span class="form-attr">Date Admitted:</span> {{ patient.admission_date | formatDateAndTime }}
                            </div>

                            <div>
                                <span class="form-attr">Date Discharge:</span> {{ patient.discharge_date | formatDateAndTime }}
                            </div>
                        </div>

                        <div class="line-form">
                            <div>
                                <span class="form-attr">Attending Physician: </span> {{ patient.attending_physician }}
                            </div>
                        </div>

                        <div class="line-form">
                            <div>
                                <span class="form-attr">Admitting Diagnosis: </span> {{ patient.doctor_diagnose.admission_diagnosis }}
                            </div>
                        </div>

                        <div class="line-form">
                            <div>
                                <span class="form-attr">Final Diagnosis: </span> {{ patient.doctor_diagnose.principal_diagnosis }}
                            </div>
                        </div>

                        <div class="line-form">
                            <div>
                                <span class="form-attr">Chief Complaints: </span> {{ patient.history.present_complain }}
                            </div>
                        </div>
                      

                        <div class="divide">
                        </div>

                        <div class="line-form">
                            <div>
                                <span class="form-attr">Laboratory Findings: </span> {{ patient.doctor_diagnose.laboratory_findings }}
                            </div>
                        </div>
                        <div class="divide">
                        </div>

                        <div class="line-form">
                            <div>
                                <span class="form-attr">Disposition (Indicate Home medication): </span> {{ patient.doctor_diagnose.medication_disposition }}
                            </div>
                        </div>

                        <div class="line-form">
                            <div>
                                <span class="form-attr">Disposition: </span> {{ patient.doctor_diagnose.disposition }} - {{ patient.doctor_diagnose.result }}
                            </div>
                        </div>


                        <div class="buttons">
                            <b-button
                                label="Print"
                                type="is-primary"
                                icon-right="printer"
                                @click="printMe">
                            </b-button>
                        </div>

                    </div>
                </div> <!--col-->
            </div> <!--cols-->
        </div>
    </div> <!--root div -->
</template>

<script>

export default{

    props: ['propPatientAdmissionId', 'propPatientId'],

    data(){
        return{
            patient: {},
        }
    },

    methods: {
        loadPatientData(){
            axios.get('/get-patient-all-data/' + this.propPatientAdmissionId + '/' + this.propPatientId).then(res=>{
                this.patient = res.data
            })
        },

        printMe(){
            window.print()
        }
    },

    mounted() {
        this.loadPatientData()
    }


}
</script>

<style scoped>

    .patient-form{
        width: 860px;
        margin: auto;
    }

    .line-form{
        display: flex;
        justify-content: space-between;
        margin: 5px 0;
    }

    .divide{
        margin: 25px 0;
    }

    .discharge-summary-text{
        font-weight: bold;
        font-size: 1.2em;
        text-align: center;
        margin: 15px 0;
    }

    .form-attr{
        font-weight: bold;
    }




    @media print {
    /*.myDivToPrint {*/
    /*    background-color: white;*/
    /*    height: 100%;*/
    /*    width: 100%;*/
    /*    position: fixed;*/
    /*    top: 0;*/
    /*    left: 0;*/
    /*    margin: 0;*/
    /*    padding: 15px;*/
    /*    font-size: 14px;*/
    /*    line-height: 18px;*/
    /*}*/



        .myDivToPrint{
            margin: 0;
            color: #000;
            background-color: #fff;
            font-size: 14px;
            height: 100%;

        }
        .nprint{
            display: none;
        }
        header, footer, aside, nav, form, iframe, .menu, .hero, .adslot {
            display: none;
        }

        .buttons{
            display: none;
        }

    }


    .printarea{
        width: 816px;
        margin: 30px auto 0;
    }




</style>