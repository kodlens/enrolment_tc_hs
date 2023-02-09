<template>
    <div>
        <b-navbar>
            <template #brand>
                <b-navbar-item>
                    <span>DOCTOR PANEL</span>
                </b-navbar-item>
            </template>
            <template #start>

            </template>

            <template #end>
                <b-navbar-item href="/doctor-home">
                    Home
                </b-navbar-item>

                <b-navbar-item href="/doctor-patients">
                    My Patients
                </b-navbar-item>

                <b-navbar-item tag="div">
                    <div class="buttons">
                        <button @click="logout" class="w2-button">
                            <span class="mdi mdi-logout"></span>
                            LOG OUT
                        </button>
                    </div>
                </b-navbar-item>
            </template>
        </b-navbar>

    </div>


</template>

<script>
export default {
    data(){
        return{
            open: false,
            overlay: false,
            fullheight: true,
            fullwidth: false,
            right: true,
            expandOnHover: true,
            reduce: false,
            mobile: "reduce",

            user: {
                role: '',
                lname: '',
                fname: '',
                mname: '',
            },
        }
    },
    methods: {
        logout(){
            axios.post('/logout').then(()=>{
                window.location = '/';
            })
        },

        loadUser(){
            axios.get('/load-user').then(res=>{
                this.user = res.data;
            })
        }
    },

    mounted(){
        this.loadUser();
    },

    computed: {
        userRole(){
            return this.user.role.toUpperCase() + ' (' + this.user.lname.toUpperCase() + ', ' + this.user.fname.toUpperCase() + ')';

        }
    }
}
</script>

<style scoped>


/* .hero{
      background-image: url("/img/bg-hero.jpg");
      background-repeat: no-repeat;
      background-size: cover;
  } */


</style>
