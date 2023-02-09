<template>
    <div>
        <div class="section">

            <div class="columns is-centered">
                <div class="column is-8-desktop">

                    <div class="box">

                        <div class="box-header">
                            <div class="box-header-text">
                                Demographic Data
                            </div>
                        </div>

                        <b-steps
                            v-model="activeStep"
                            :animated="isAnimated"
                            :rounded="isRounded"
                            :has-navigation="hasNavigation"
                            :icon-prev="prevIcon"
                            :icon-next="nextIcon"
                            :label-position="labelPosition"
                            :mobile-mode="mobileMode">
                            <b-step-item step="1" label="Profile" :clickable="isStepsClickable">
                                <h1 class="subtitle has-text-centered">Profile</h1>
                                <patient-profile @emitPatientData="resultPatientData"></patient-profile>
                            </b-step-item>

                            <b-step-item step="2" label="Other Info" :clickable="isStepsClickable" :type="{'is-success': isProfileSuccess}">
                                <h1 class="subtitle has-text-centered">Other Info</h1>
                                <patient-admission :prop-patient="patientData"></patient-admission>
                            </b-step-item>


                            <template
                                v-if="customNavigation"
                                #navigation="{previous, next}">
                                <b-button
                                    outlined
                                    type="is-danger"
                                    icon-pack="fas"
                                    icon-left="backward"
                                    :disabled="previous.disabled"
                                    @click.prevent="previous.action">
                                    Previous
                                </b-button>
                                <b-button
                                    outlined
                                    type="is-success"
                                    icon-pack="fas"
                                    icon-right="forward"
                                    :disabled="next.disabled"
                                    @click.prevent="next.action">
                                    Next
                                </b-button>
                            </template>
                        </b-steps>


                    </div><!--box-->
                </div>
            </div>
        </div>
    </div> <!--root div-->

</template>

<script>

export default {
   
    data(){
        return{

            patientData: {},

            fields: {},
            errors: {},

            activeStep: 0,

            showSocial: false,
            isAnimated: true,
            isRounded: true,
            isStepsClickable: true,

            hasNavigation: true,
            customNavigation: false,
            isProfileSuccess: false,

            prevIcon: 'chevron-left',
            nextIcon: 'chevron-right',
            labelPosition: 'bottom',
            mobileMode: 'minimalist'
        }
    },

    methods: {

        resultPatientData(data){
            this.patientData = data;
            console.log(this.patientData);
            this.activeStep = 1
        }
    },


}


</script>

<style scoped>
    .box-header-text{
        font-weight: bolder;
        font-size: 1.2em;
    }

   



</style>