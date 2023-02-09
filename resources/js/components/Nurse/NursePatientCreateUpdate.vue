<template>
    <div>
        <div class="section">
            <div class="columns is-centered">
                <div class="column is-8-desktop is-10-tablet">
                    <div class="box">
                        <div class="box-text">
                            Create/Edit Patient Information
                        </div>

                        <div class="info-container">
                                   
                            <div class="columns">
                                <div class="column">
                                    <b-field label="Last Name" label-position="on-border"
                                        :type="this.errors.lname ? 'is-danger':''"
                                        :message="this.errors.lname ? this.errors.lname[0] : ''"
                                    >
                                        <b-input type="text" v-model="fields.lname"
                                            placeholder="Last Name">
                                        </b-input>
                                    </b-field>
                                </div>

                                <div class="column">
                                    <b-field label="First Name" label-position="on-border"
                                        :type="this.errors.fname ? 'is-danger':''"
                                        :message="this.errors.fname ? this.errors.fname[0] : ''"
                                    >
                                        <b-input type="text" v-model="fields.fname"
                                            placeholder="First Name">
                                        </b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Middle Name" label-position="on-border"
                                        :type="this.errors.mname ? 'is-danger':''"
                                        :message="this.errors.mname ? this.errors.mname[0] : ''"
                                    >
                                        <b-input type="text" v-model="fields.mname"
                                            placeholder="Last Name">
                                        </b-input>
                                    </b-field>
                                </div>

                                <div class="column">
                                    <b-field label="Suffix" label-position="on-border"
                                        :type="this.errors.suffix ? 'is-danger':''"
                                        :message="this.errors.suffix ? this.errors.suffix[0] : ''"
                                    >
                                        <b-input type="text" v-model="fields.suffix"
                                            placeholder="First Name">
                                        </b-input>
                                    </b-field>
                                </div>
                            </div>

                            <!-- address -->
                            <div class="info-form-divider">Permanent Address</div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Province" label-position="on-border" expanded
                                        :type="this.errors.province ? 'is-danger':''"
                                        :message="this.errors.province ? this.errors.province[0] : ''"
                                    >
                                        <b-select v-model="fields.province" @input="loadCity" expanded>
                                            <option v-for="(item, index) in provinces" :key="index" :value="item.provCode">{{ item.provDesc }}</option>
                                        </b-select>
                                    </b-field>
                                </div>

                                <div class="column">
                                    <b-field label="City" label-position="on-border" expanded
                                        :type="this.errors.city ? 'is-danger':''"
                                        :message="this.errors.city ? this.errors.city[0] : ''"
                                    >
                                        <b-select v-model="fields.city" @input="loadBarangay" expanded>
                                            <option v-for="(item, index) in cities" :key="index" :value="item.citymunCode">{{ item.citymunDesc }}</option>
                                        </b-select>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Barangay" label-position="on-border" expanded
                                            :type="this.errors.barangay ? 'is-danger':''"
                                            :message="this.errors.barangay ? this.errors.barangay[0] : ''">
                                        <b-select v-model="fields.barangay" expanded>
                                            <option v-for="(item, index) in barangays" :key="index" :value="item.brgyCode">{{ item.brgyDesc }}</option>
                                        </b-select>
                                    </b-field>
                                </div>
                                <div class="column">
                                    <b-field label="Street" label-position="on-border">
                                        <b-input v-model="fields.street"
                                                placeholder="Street">
                                        </b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Contact No." label-position="on-border"
                                        :type="this.errors.contact_no ? 'is-danger':''"
                                        :message="this.errors.contact_no ? this.errors.contact_no[0] : ''"
                                    >
                                        <b-input type="text" v-model="fields.contact_no"
                                            placeholder="Contact No.">
                                        </b-input>
                                    </b-field>
                                </div>
                                <div class="column">
                                    <b-field label="Sex" label-position="on-border"
                                        :type="this.errors.sex ? 'is-danger':''"
                                        :message="this.errors.sex ? this.errors.sex[0] : ''"
                                        expanded
                                    >
                                        <b-select v-model="fields.sex"
                                            expanded
                                            placeholder="Sex">
                                            <option value="MALE">MALE</option>
                                            <option value="FEMALE">FEMALE</option>
                                        </b-select>
                                    </b-field>
                                </div>

                                <div class="column">
                                    <b-field label="Civil Status" label-position="on-border"
                                        :type="this.errors.civil_status ? 'is-danger':''"
                                        :message="this.errors.civil_status ? this.errors.civil_status[0] : ''"
                                        expanded
                                    >
                                        <b-select v-model="fields.civil_status"
                                            expanded
                                            placeholder="Civil Status">
                                            <option value="SINGLE">SINGLE</option>
                                            <option value="MARRIED">MARRIED</option>
                                            <option value="WIDOWED">WIDOWED</option>
                                            <option value="SEPARATED">SEPARATED</option>
                                        </b-select>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Birthdate" label-position="on-border"
                                        :type="this.errors.bdate ? 'is-danger':''"
                                        :message="this.errors.bdate ? this.errors.bdate[0] : ''"
                                        expanded
                                    >
                                        <b-datepicker v-model="bdate"
                                            placeholder="Birthdate">
                                        </b-datepicker>
                                    </b-field>
                                </div>
                                <div class="column">
                                    <b-field label="Birth Place" label-position="on-border"
                                        :type="this.errors.birthplace ? 'is-danger':''"
                                        :message="this.errors.birthplace ? this.errors.birthplace[0] : ''"
                                    >
                                        <b-input type="text" v-model="fields.birthplace"
                                            placeholder="Birth Place">
                                        </b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Nationality" label-position="on-border"
                                        :type="this.errors.nationality ? 'is-danger':''"
                                        :message="this.errors.nationality ? this.errors.nationality[0] : ''"
                                        expanded
                                    >
                                        <b-select v-model="fields.nationality"
                                            expanded
                                            placeholder="Nationality">
                                            <option v-for="(item, index) in nationalities" 
                                                :key="index" :value="item.nationality">
                                                {{ item.nationality }}
                                            </option>
                                            
                                        </b-select>
                                    </b-field>
                                </div>
                                <div class="column">
                                    <b-field label="Religion" label-position="on-border"
                                        :type="this.errors.religion ? 'is-danger':''"
                                        :message="this.errors.religion ? this.errors.religion[0] : ''"
                                        expanded
                                    >
                                        <b-select v-model="fields.religion"
                                            expanded
                                            placeholder="Religion">
                                            <option v-for="(item, index) in religions" 
                                                :key="index" :value="item.religion">
                                                {{ item.religion }}
                                            </option>
                                            
                                        </b-select>
                                    </b-field>
                                </div>
                            </div>


                            <div class="info-form-divider">Parents Information</div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Mother Maiden Name" label-position="on-border"
                                        :type="this.errors.mother_maiden_name ? 'is-danger':''"
                                        :message="this.errors.mother_maiden_name ? this.errors.mother_maiden_name[0] : ''"
                                    >
                                        <b-input type="text" v-model="fields.mother_maiden_name"
                                            placeholder="Mother Maiden">
                                        </b-input>
                                    </b-field>
                                </div>

                                <div class="column">
                                    <b-field label="Father Name" label-position="on-border"
                                        :type="this.errors.father_name ? 'is-danger':''"
                                        :message="this.errors.father_name ? this.errors.father_name[0] : ''"
                                    >
                                        <b-input type="text" v-model="fields.father_name"
                                            placeholder="First Name">
                                        </b-input>
                                    </b-field>
                                </div>
                            </div>

                            <div class="columns">
                                <div class="column">
                                    <b-field label="Family HIstory" label-position="on-border"
                                        :type="this.errors.family_history ? 'is-danger':''"
                                        :message="this.errors.family_history ? this.errors.family_history[0] : ''"
                                    >
                                        <b-input type="textarea" v-model="fields.family_history"
                                            placeholder="Family HIstory">
                                        </b-input>
                                    </b-field>
                                </div>
                            </div>


                        </div><!--info container -->

                        <div class="buttons is-right">
                            <b-button @click="submit" 
                                type="is-primary"
                                class="mt-5"
                                label="Save Information"></b-button>
                        </div>
        
                    </div> <!-- box -->

                </div>
            </div>
        </div>
    </div><!-- root -->
</template>

<script>

export default{
    props: ['propNationalities', 'propReligions', 'propData', 'propLname', 'propFname'],
    data(){
        return {

            activeStep: 0,

            showSocial: false,
            isAnimated: true,
            isRounded: true,
            isStepsClickable: false,

            hasNavigation: true,
            customNavigation: false,
            isProfileSuccess: false,

            prevIcon: 'chevron-left',
            nextIcon: 'chevron-right',
            labelPosition: 'bottom',
            mobileMode: 'minimalist',

            fields: {},
            errors: {},
            bdate: null,

            provinces: [],
            cities: [],
            barangays: [],
            street: '',

            religions: [],
            nationalities: [],

            global_id: 0,
        }
    },

    methods: {
        loadProvince: function(){
            axios.get('/load-provinces').then(res=>{
                this.provinces = res.data;
            })
        },

        loadCity: function(){
            axios.get('/load-cities?prov=' + this.fields.province).then(res=>{
                this.cities = res.data;
            })
        },

        loadBarangay: function(){
            axios.get('/load-barangays?prov=' + this.fields.province + '&city_code='+this.fields.city).then(res=>{
                this.barangays = res.data;
            })
        },

        submit: function(){

            let ndate = new Date(this.bdate)
            
            this.fields.bdate = ndate.getFullYear() + '-' + (ndate.getMonth() + 1) + '-' + ndate.getDate()

            if(this.global_id > 0){
                axios.put('/nurse-patient/'+this.global_id, this.fields).then(res=>{
                    if(res.data.status === 'updated'){
                        this.$buefy.dialog.alert({
                            title: 'Updated!',
                            message: 'Successfully update.',
                            type: 'is-success',
                            confirmText: 'OK',
                            onConfirm: () => {
                                window.location = '/nurse-patient';
                            }
                        })
                    }
                }).catch(err=>{
                    if (err.response.status === 422) {
                        this.errors = err.response.data.errors;
                    }
                })
            }else{
                axios.post('/nurse-patient', this.fields).then(res=>{
                    if(res.data.status === 'saved'){
                        this.$buefy.dialog.alert({
                            title: 'Saved!',
                            message: 'Successfully saved.',
                            type: 'is-success',
                            confirmText: 'OK',
                            onConfirm: () => {
                                window.location = '/nurse-patient';
                            }
                        })
                    }
                }).catch(err=>{
                    if (err.response.status === 422) {
                        this.errors = err.response.data.errors;
                    }
                })

            }
        },

        getData(){

            let tempData = this.fields;
            this.bdate = new Date(this.fields.bdate);

            axios.get('/load-cities?prov=' + this.fields.province).then(res=>{
                //load barangay
                this.cities = res.data;
                axios.get('/load-barangays?prov=' + this.fields.province + '&city_code='+this.fields.city).then(res=>{
                    this.barangays = res.data;
                    this.fields = tempData;
                });
            });

        },

        initData(){
            this.nationalities = JSON.parse(this.propNationalities)
            this.religions = JSON.parse(this.propReligions)

            this.fields.lname = this.propLname;
            this.fields.fname = this.propFname;


            if(this.propData != ''){
                this.fields = JSON.parse(this.propData)
                this.global_id = this.fields.patient_id;

                this.getData()
            }

            //console.log(this.patient)
        }


    },

    mounted(){
        this.loadProvince()
        this.initData()
    }
}
</script>

<style scoped>
    .info-container{
        padding: 25px;
    }

    .info-form-divider{
        margin: 15px 0;
        font-weight: bold;
    }
</style>