<template>
    <div>

        <section class="welcome-container">
            <div class="welcome">
                <div class="welcome-text">
                    <p class="title">
                        WELCOME TO MEDICAL RECORD SYSTEM
                    </p>
                    <p class="subtitle">
                        Inpatient Record System
                    </p>
                </div>

                <div class="model-img">
                    <img src="/img/model.png" />
                </div>
            </div>
            
        </section>


    </div> <!--root div-->
</template>

<script>
export default {
    props: ['propUser', 'propCategories'],
    data(){
        return{
            locale: undefined,
            isModalActive: false,
        }
    },

    methods: {
        signup: function(){
            window.location = '/employer/signup'
        },
    },

    mounted() {
        
    },


}
</script>

<style scoped src="../../css/welcomepage.css">


    @media only screen and (max-width: 1024px) {

    }

    @media only screen and (max-width: 768px) {
        
    }

    @media only screen and (max-width: 480px) {
       

    }







</style>
