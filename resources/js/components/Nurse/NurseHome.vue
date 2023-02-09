<template>
    <div>
        <div class="welcome-container">

            <div class="loader-3">
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
            </div>

            <div class="welcome-text">
                WELCOME NURSE
            </div>


            <div class="box-menu">
                <div class="box home-box">
                    <div class="subtitle">ADMISSION</div>
                    <div class="buttons">
                        <b-button
                            tag="a"
                            href="/admission"
                            icon-right="arrow-right" label="Proceed"></b-button>
                    </div>
                </div>
            </div>



            
        </div>
    </div>
</template>

<script>
export default {
	data(){
		return{
            info: {},
		}
	},

	methods:{
	},

    mounted() {
    }
}
</script>

<style scoped src="../../../css/nurse-home.css">
</style>
