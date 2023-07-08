<template>
    <section class="section">
        <div class="columns is-centered">
            <div class="column is-6">
                <form @submit.prevent="submit">

                    <div class="box">
                        <div class="box-title">
                            ENHANCED BASIC EDUCATION ENROLLMENT FORM
                        </div>

                        <div class="panel-body">

                            <div class="divider">ACCOUNT</div>
                            <div class="columns">
                                <div class="column">
                                    <b-field label="Username"
                                             :type="this.errors.username ? 'is-danger':''"
                                             :message="this.errors.username ? this.errors.username[0] : ''">
                                        <b-input type="text" v-model="fields.username" placeholder="Username" icon="account"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Password"
                                             :type="this.errors.password ? 'is-danger':''"
                                             :message="this.errors.password ? this.errors.password[0] : ''">
                                        <b-input type="password"  v-model="fields.password"
                                            placeholder="Password" icon="lock" password-reveal></b-input>
                                    </b-field>
                                </div>
                                <div class="column">
                                    <b-field label="Re-type Password">
                                        <b-input type="password" icon="lock" v-model="fields.password_confirmation" 
                                            placeholder="Re-type Password" password-reveal></b-input>
                                    </b-field>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column">
                                    <b-field label="E-mail"
                                             :type="this.errors.email ? 'is-danger':''"
                                             :message="this.errors.email ? this.errors.email[0] : ''">
                                        <b-input type="email" v-model="fields.email" 
                                            placeholder="E-mail" icon="email"></b-input>
                                    </b-field>
                                </div>
                                <div class="column">
                                    <b-field label="Contact No."
                                             :type="this.errors.contact_no ? 'is-danger':''"
                                             :message="this.errors.contact_no ? this.errors.contact_no[0] : ''">
                                        <b-input type="tel" 
                                            v-model="fields.contact_no" 
                                            pattern="^(09|\+639)\d{9}$"
                                            placeholder="Format: 09191112222" icon=""></b-input>
                                    </b-field>
                                </div>
                            </div>


                            <div class="divider">LEARNER INFORMATION</div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="LRN"
                                            :type="this.errors.lrn ? 'is-danger':''"
                                            :message="this.errors.lrn ? this.errors.lrn[0] : ''" >
                                        <b-input icon="account" placeholder="LRN" v-model="fields.lrn" type="text"></b-input>
                                    </b-field>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column">
                                    <b-field label="Last Name"
                                            :type="this.errors.lname ? 'is-danger':''"
                                            :message="this.errors.lname ? this.errors.lname[0] : ''" >
                                        <b-input icon="account" placeholder="First Lastname" v-model="fields.lname" type="text"></b-input>
                                    </b-field>
                                </div>
                                <div class="column">
                                    <b-field label="First Name"
                                             :type="this.errors.fname ? 'is-danger':''"
                                             :message="this.errors.fname ? this.errors.fname[0] : ''">
                                        <b-input icon="account" v-model="fields.fname" placeholder="First Name" type="text"></b-input>
                                    </b-field>
                                </div>
                            </div>


                            <div class="columns">
                                <div class="column">
                                    <b-field label="Middle Name">
                                        <b-input v-model="fields.mname" type="text" placeholder="Middle Name"></b-input>
                                    </b-field>
                                </div>

                                <div class="column">
                                    <b-field label="Suffix">
                                        <b-input type="text" v-model="fields.suffix" placeholder="Suffix"></b-input>
                                    </b-field>
                                </div>

                                <div class="column">
                                    <b-field label="Sex" expanded
                                            :type="this.errors.sex ? 'is-danger':''"
                                            :message="this.errors.sex ? this.errors.sex[0] : ''">
                                        <b-select placeholder="Sex" v-model="fields.sex" icon="account" expanded>
                                            <option value="MALE">MALE</option>
                                            <option value="FEMALE">FEMALE</option>
                                        </b-select>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Birthdate"
                                        :type="this.errors.bdate ? 'is-danger':''"
                                        :message="this.errors.bdate ? this.errors.bdate[0] : ''">
                                        <b-datepicker v-model="fields.bdate" placeholder="Birthdate"></b-datepicker>
                                    </b-field>
                                </div>
                                <div class="column">
                                    <b-field label="Age"
                                        :type="this.errors.age ? 'is-danger':''"
                                        :message="this.errors.age ? this.errors.age[0] : ''">
                                        <b-input type="number" v-model="fields.age"
                                            max="120"
                                            placeholder="Age"></b-input>
                                    </b-field>
                                </div>
                                <div class="column">
                                    <b-field label="Birthplace"
                                        :type="this.errors.birthplace ? 'is-danger':''"
                                        :message="this.errors.birthplace ? this.errors.birthplace[0] : ''">
                                        <b-input type="text" v-model="fields.birthplace" placeholder="Birthplace"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Mother Tongue"
                                        :type="this.errors.mother_tongue ? 'is-danger':''"
                                        :message="this.errors.mother_tongue ? this.errors.mother_tongue[0] : ''">
                                        <b-input type="text" v-model="fields.mother_tongue" placeholder="Mother Tongue"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Belong in Indigenous Peoples?"
                                        :type="this.errors.is_indigenous ? 'is-danger':''"
                                        :message="this.errors.is_indigenous ? this.errors.is_indigenous[0] : ''"
                                        expanded>
                                        <b-select v-model="fields.is_indigenous" 
                                            placeholder="Belong in Indigenous Peoples?" expanded>
                                            <option value="1">YES</option>
                                            <option value="0">NO</option>
                                        </b-select>
                                    </b-field>
                                </div>
                                <div class="column" v-if="fields.is_indigenous == 1">
                                    <b-field label="If YES, Please specify"
                                        :type="this.errors.if_yes_indigenous ? 'is-danger':''"
                                        :message="this.errors.if_yes_indigenous ? this.errors.if_yes_indigenous[0] : ''">
                                        <b-input type="text" v-model="fields.if_yes_indigenous" placeholder="If YES, Please specify"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Beneficiary of 4Ps?"
                                        :type="this.errors.is_4ps ? 'is-danger':''"
                                        :message="this.errors.is_4ps ? this.errors.is_4ps[0] : ''"
                                        expanded>
                                        <b-select v-model="fields.is_4ps" 
                                            placeholder="Beneficiary of 4Ps?" expanded>
                                            <option value="1">YES</option>
                                            <option value="0">NO</option>
                                        </b-select>
                                    </b-field>
                                </div>
                                <div class="column" v-if="fields.is_4ps == 1">
                                    <b-field label="If YES, Please input 4Ps Household Id No."
                                        :type="this.errors.household_4ps_id_no ? 'is-danger':''"
                                        :message="this.errors.household_4ps_id_no ? this.errors.household_4ps_id_no[0] : ''">
                                        <b-input type="text" v-model="fields.household_4ps_id_no" placeholder="4Ps Household Id No."></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <!-- Current Address -->

                            <div class="mb-2">
                                <h2><span>Current Address</span></h2>
                            </div>
                            
                            <div class="columns">
                                <div class="column">
                                    <b-field label="Province" expanded
                                             :type="this.errors.current_province ? 'is-danger':''"
                                             :message="this.errors.current_province ? this.errors.current_province[0] : ''">
                                        <b-select v-model="fields.current_province" expanded placeholder="Province" @input="loadCurrentCity">
                                            <option v-for="(item, index) in current_provinces" :key="index" :value="item.provCode">{{ item.provDesc }}</option>
                                        </b-select>
                                    </b-field>
                                </div>
                                <div class="column">
                                    <b-field label="City/Municipality" expanded
                                             :type="this.errors.current_city ? 'is-danger':''"
                                             :message="this.errors.current_city ? this.errors.current_city[0] : ''">
                                        <b-select expanded v-model="fields.current_city" placeholder="City" @input="loadCurrentBarangay">
                                            <option v-for="(item, index) in current_cities" :key="index" :value="item.citymunCode">{{ item.citymunDesc }}</option>
                                        </b-select>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Barangay" expanded
                                             :type="this.errors.current_barangay ? 'is-danger':''"
                                             :message="this.errors.current_barangay ? this.errors.current_barangay[0] : ''">
                                        <b-select v-model="fields.current_barangay" expanded placeholder="Barangay">
                                            <option v-for="(item, index) in current_barangays" :key="index" :value="item.brgyCode">{{ item.brgyDesc }}</option>
                                        </b-select>
                                    </b-field>
                                </div>
                                <div class="column">
                                    <b-field label="House #. Street">
                                        <b-input type="text" v-model="fields.current_street" placeholder="House #. Street"></b-input>
                                    </b-field>
                                </div>

                                <div class="column">
                                    <b-field label="Zip Code">
                                        <b-input type="text" v-model="fields.current_zipcode" placeholder="Zip Code"></b-input>
                                    </b-field>
                                </div>
                            </div>


                            <!-- Permanent Address -->

                            <div class="mb-2">
                                <h2><span>Permanent Address</span></h2>
                            </div>
                            
                            <div class="buttons">
                                <b-button class="is-info is-small" @click="copyCurrentAddress" icon-left="home">Same as current address</b-button>
                            </div>
                            <div class="columns">
                                <div class="column">
                                    <b-field label="Province" expanded
                                             :type="this.errors.permanent_province ? 'is-danger':''"
                                             :message="this.errors.permanent_province ? this.errors.permanent_province[0] : ''">
                                        <b-select v-model="fields.permanent_province" expanded placeholder="Province" @input="loadPermanentCity">
                                            <option v-for="(item, index) in permanent_provinces" :key="index" :value="item.provCode">{{ item.provDesc }}</option>
                                        </b-select>
                                    </b-field>
                                </div>
                                <div class="column">
                                    <b-field label="City/Municipality" expanded
                                             :type="this.errors.permanent_city ? 'is-danger':''"
                                             :message="this.errors.permanent_city ? this.errors.permanent_city[0] : ''">
                                        <b-select expanded v-model="fields.permanent_city" placeholder="City" @input="loadPermanentBarangay">
                                            <option v-for="(item, index) in permanent_cities" :key="index" :value="item.citymunCode">{{ item.citymunDesc }}</option>
                                        </b-select>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Barangay" expanded
                                             :type="this.errors.permanent_barangay ? 'is-danger':''"
                                             :message="this.errors.permanent_barangay ? this.errors.permanent_barangay[0] : ''">
                                        <b-select v-model="fields.permanent_barangay" expanded placeholder="Barangay">
                                            <option v-for="(item, index) in permanent_barangays" :key="index" :value="item.brgyCode">{{ item.brgyDesc }}</option>
                                        </b-select>
                                    </b-field>
                                </div>
                                <div class="column">
                                    <b-field label="House #. Street">
                                        <b-input type="text" v-model="fields.permanent_street" placeholder="House #. Street"></b-input>
                                    </b-field>
                                </div>
                                <div class="column">
                                    <b-field label="Zip Code">
                                        <b-input type="text" v-model="fields.permanent_zipcode" placeholder="Zip Code"></b-input>
                                    </b-field>
                                </div>
                            </div>


                            <!-- Parents/Guardians Information -->
                            <div class="divider">PARENTS/GUARDIANS INFORMATION</div>
                         
                            <div class="columns">
                                <div class="column">
                                    <b-field label="Father Last Name"
                                             :type="this.errors.father_lname ? 'is-danger':''"
                                             :message="this.errors.father_lname ? this.errors.father_lname[0] : ''" >
                                        <b-input icon="account" placeholder="Father Last Name" v-model="fields.father_lname" type="text"></b-input>
                                    </b-field>
                                </div>
                                <div class="column">
                                    <b-field label="Father First Name"
                                             :type="this.errors.father_fname ? 'is-danger':''"
                                             :message="this.errors.father_fname ? this.errors.father_fname[0] : ''">
                                        <b-input icon="account" v-model="fields.father_fname" placeholder="Father First Name" type="text"></b-input>
                                    </b-field>
                                </div>
                            </div>


                            <div class="columns">
                                <div class="column">
                                    <b-field label="Father Middle Name">
                                        <b-input v-model="fields.father_mname" 
                                            icon="account" type="text" placeholder="Father Middle Name"></b-input>
                                    </b-field>
                                </div>

                                <div class="column">
                                    <b-field label="Father Contact No.">
                                        <b-input type="tel" 
                                            v-model="fields.father_contact_no" 
                                            icon="cellphone"
                                            pattern="^(09|\+639)\d{9}$"
                                            placeholder="Format: 09101112222"></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <hr>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Mother Maiden Last Name"
                                             :type="this.errors.mother_maiden_lname ? 'is-danger':''"
                                             :message="this.errors.mother_maiden_lname ? this.errors.mother_maiden_lname[0] : ''" >
                                        <b-input icon="account" 
                                            placeholder="Mother Maiden Last Name"
                                            v-model="fields.mother_maiden_lname" type="text"></b-input>
                                    </b-field>
                                </div>
                                <div class="column">
                                    <b-field label="Mother Maiden First Name"
                                            :type="this.errors.mother_maiden_fname ? 'is-danger':''"
                                            :message="this.errors.mother_maiden_fname ? this.errors.mother_maiden_fname[0] : ''">
                                        <b-input icon="account" 
                                            v-model="fields.mother_maiden_fname" 
                                            placeholder="Mother Maiden First Name" type="text"></b-input>
                                    </b-field>
                                </div>
                            </div>


                            <div class="columns">
                                <div class="column">
                                    <b-field label="Mother Maiden Middle Name">
                                        <b-input v-model="fields.mother_maiden_mname" 
                                            type="text" 
                                            icon="account"
                                            placeholder="Mother Maiden Middle Name"></b-input>
                                    </b-field>
                                </div>

                                <div class="column">
                                    <b-field label="Mother Maiden Contact No.">
                                        <b-input type="tel" v-model="fields.mother_maiden_contact_no" 
                                            pattern="^(09|\+639)\d{9}$"
                                            placeholder="Format: 09101112222"></b-input>
                                    </b-field>
                                </div>
                            </div>


                            <hr>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Guardian Last Name"
                                            :type="this.errors.guardian_lname ? 'is-danger':''"
                                            :message="this.errors.guardian_lname ? this.errors.guardian_lname[0] : ''" >
                                        <b-input icon="account" placeholder="Guardian Last Name" v-model="fields.guardian_lname" type="text"></b-input>
                                    </b-field>
                                </div>
                                <div class="column">
                                    <b-field label="Guardian First Name"
                                            :type="this.errors.guardian_fname ? 'is-danger':''"
                                            :message="this.errors.guardian_fname ? this.errors.guardian_fname[0] : ''">
                                        <b-input icon="account" v-model="fields.guardian_fname" placeholder="Guardian First Name" type="text"></b-input>
                                    </b-field>
                                </div>
                            </div>


                            <div class="columns">
                                <div class="column">
                                    <b-field label="Guardian Middle Name">
                                        <b-input v-model="fields.guardian_mname" 
                                            icon="account"
                                            type="text" placeholder="Guardian Middle Name"></b-input>
                                    </b-field>
                                </div>

                                <div class="column">
                                    <b-field label="Guardian Contact No.">
                                        <b-input type="text" v-model="fields.guardian_contact_no" 
                                            icon="cellphone" 
                                            placeholder="Guardian Contact No."></b-input>
                                    </b-field>
                                </div>
                            </div>

                            <hr>
                            <div class="buttons is-right">
                                <button class="button is-primary">Register</button>
                            </div>

                        </div> <!--panel -body-->
                    </div> <!--panel-->

                </form>
            </div><!--column-->
        </div><!--cols-->
    </section>
</template>

<script>
export default {

    data(){
        return{

            fields: {
                lrn: '',
                lname: '',
                fname: '',
                mname: '',
                sex:'',
                age: '',
                bdate: null,
                birthplace: '',

                permanent_province: '',
                permanent_city: '',
                permanent_barangay: '',
                permanent_street: '',
                permanent_zipcode: '',

                current_province: '',
                current_city: '',
                current_barangay: '',
                current_street: '',
                current_zipcode: '',

            },
            errors: {},

            current_provinces: [],
            current_cities: [],
            current_barangays: [],

            permanent_provinces: [],
            permanent_cities: [],
            permanent_barangays: [],
        }
    },
    methods: {
        //ADDRESS
        loadCurrentProvince: function(){
            axios.get('/load-provinces').then(res=>{
                this.current_provinces = res.data;
            })
        },
        loadCurrentCity: function(){
            axios.get('/load-cities?prov=' + this.fields.current_province).then(res=>{
                this.current_cities = res.data;
            })
        },

        loadCurrentBarangay: function(){
            axios.get('/load-barangays?prov=' + this.fields.current_province + '&city_code='+this.fields.current_city).then(res=>{
                this.current_barangays = res.data;
            })
        },

        loadPermanentProvince: function(){
            axios.get('/load-provinces').then(res=>{
                this.permanent_provinces = res.data;
            })
        },
        loadPermanentCity: function(){
            axios.get('/load-cities?prov=' + this.fields.permanent_province).then(res=>{
                this.permanent_cities = res.data;
            })
        },

        loadPermanentBarangay: function(){
            axios.get('/load-barangays?prov=' + this.fields.permanent_province + '&city_code='+this.fields.permanent_city).then(res=>{
                this.permanent_barangays = res.data;
            })
        },
        //ADDRESS

        //copy current address
        copyCurrentAddress(){
            this.fields.permanent_province = this.fields.current_province;

            this.loadPermanentCity();

            this.fields.permanent_city = this.fields.current_city;

            this.loadPermanentBarangay();

            this.fields.permanent_barangay = this.fields.current_barangay;


            this.fields.permanent_street = this.fields.current_street;
            this.fields.permanent_zipcode = this.fields.current_zipcode;
        },



        submit(){
            axios.post('/registration', this.fields).then(res=>{
                if(res.data.status === 'saved'){
                    this.$buefy.dialog.alert({
                        title: "SAVED!",
                        message: 'Register successfully',
                        type: 'is-success',
                        onConfirm: ()=>  window.location = '/'
                    });
                }

            }).catch(err=>{
                if(err.response.status === 422){
                    this.errors = err.response.data.errors;
                }else{
                    alert('An error occured.');
                }
            });
        },
    },


    mounted() {
        this.loadCurrentProvince();
        this.loadPermanentProvince();

    }
}
</script>

<style scoped>


    .box-title{
        font-weight: bold;
        font-size: 1.5rem;
        text-align: center;
    }

/*    dere lang kubia ang panel color*/
</style>
