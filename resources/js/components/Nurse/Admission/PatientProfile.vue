<template>
    <div>

        
        <div class="columns">
            <div class="column">
                <b-field label="Type of admission" expanded
                :type="this.errors.admission_type ? 'is-danger':''"
                :message="this.errors.admission_type ? this.errors.admission_type[0] : ''">
                    <b-select v-model="admission_type"
                        @input="changeEvent"
                        expanded>
                        <option value="NEW">NEW</option>
                        <option value="OLD">OLD</option>
                    </b-select>
                </b-field>
            </div>

            <div v-if="admission_type === 'OLD'" class="column">
                <modal-browse-patient @browsePatient="emitPatient"></modal-browse-patient>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <b-field label="Last Name"
                    :type="this.errors.lname ? 'is-danger':''"
                    :message="this.errors.lname ? this.errors.lname[0] : ''">
                    <b-input type="text"
                             v-model="fields.lname" placeholder="Last Name"></b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="First Name"
                    :type="this.errors.fname ? 'is-danger':''"
                    :message="this.errors.fname ? this.errors.fname[0] : ''">
                    <b-input type="text"
                             v-model="fields.fname" placeholder="First Name"></b-input>
                </b-field>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <b-field label="Middle Name">
                    <b-input type="text"
                             v-model="fields.mname" placeholder="Middle Name"></b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="Suffix">
                    <b-input type="text"
                             v-model="fields.suffix" placeholder="Suffix"></b-input>
                </b-field>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <b-field label="Permanent Address"
                    :type="this.errors.per_address ? 'is-danger':''"
                    :message="this.errors.per_address ? this.errors.per_address[0] : ''">
                    <b-input type="text"
                             v-model="fields.per_address" placeholder="Permanent Address"></b-input>
                </b-field>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <b-field label="Contact No."
                    :type="this.errors.contact_no ? 'is-danger':''"
                    :message="this.errors.contact_no ? this.errors.contact_no[0] : ''">
                    <b-input type="text"
                             v-model="fields.contact_no" placeholder="Contact No."></b-input>
                </b-field>
            </div>

            <div class="column">
                <b-field label="Sex" expanded
                    :type="this.errors.sex ? 'is-danger':''"
                    :message="this.errors.sex ? this.errors.sex[0] : ''">
                    <b-select expanded
                        v-model="fields.sex" placeholder="Sex">
                        <option value="MALE">MALE</option>
                        <option value="FEMALE">FEMALE</option>
                    </b-select>
                </b-field>
            </div>
            <div class="column">
                <b-field label="Civil Status" expanded>
                    <b-select expanded
                              v-model="fields.civil_status" placeholder="Civil Status">
                        <option value="SINGLE">SINGLE</option>
                        <option value="DIVORCE">DIVORCE</option>
                        <option value="SEPARATED">SEPARATED</option>
                        <option value="COHABITATION">COHABITATION</option>
                        <option value="WIDOWED">WIDOWED</option>
                        <option value="MARRIED">MARRIED</option>
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
            <div class="column is-2">
                <b-field label="Age"
                    :type="this.errors.age ? 'is-danger':''"
                    :message="this.errors.age ? this.errors.age[0] : ''">
                    <b-input v-model="fields.age" placeholder="Age"></b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="Birthplace">
                    <b-input v-model="fields.birthplace" placeholder="Birthplace"></b-input>
                </b-field>
            </div>
        </div>


        <div class="columns">
            <div class="column">
                <b-field label="Nationality" expanded>
                    <b-select v-model="fields.nationality" expanded
                              placeholder="Nationality">
                        <option v-for="(item, index) in nationalities" :key="index"
                                :value="item.nationality">{{ item.nationality }}</option>
                    </b-select>
                </b-field>
            </div>
            <div class="column">
                <b-field label="Religion" expanded>
                    <b-select expanded
                              v-model="fields.religion" placeholder="Religion">
                        <option v-for="(item, index) in religions" :key="index"
                                :value="item.religion">{{ item.religion }}</option>
                    </b-select>
                </b-field>
            </div>
            <div class="column">
                <b-field label="Occupation">
                    <b-input v-model="fields.occupation" placeholder="Occupation"></b-input>
                </b-field>
            </div>
        </div>

        <div class="divider"></div>

        <div class="columns">
            <div class="column">
                <b-field label="Employer" expanded>
                    <b-input type="text" v-model="fields.employer"
                             placeholder="Employer">
                    </b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="Address" expanded>
                    <b-input type="text" v-model="fields.employer_address"
                             placeholder="Address">
                    </b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="Contact No.">
                    <b-input v-model="fields.employer_contact_no"
                             placeholder="Contact No."></b-input>
                </b-field>
            </div>
        </div>

        <!-- FATHER -->
        <div class="columns">
            <div class="column">
                <b-field label="Father's Name" expanded>
                    <b-input type="text" v-model="fields.father_name"
                             placeholder="Father's Name">
                    </b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="Address" expanded>
                    <b-input type="text" v-model="fields.father_address"
                             placeholder="Address">
                    </b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="Contact No.">
                    <b-input v-model="fields.father_contact_no"
                             placeholder="Contact No."></b-input>
                </b-field>
            </div>
        </div>

        <!-- MOTHER -->
        <div class="columns">
            <div class="column">
                <b-field label="Mother's (Maiden) Name" expanded>
                    <b-input type="text" v-model="fields.mother_maiden_name"
                             placeholder="Mother's (Maiden) Name">
                    </b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="Address" expanded>
                    <b-input type="text" v-model="fields.mother_address"
                             placeholder="Address">
                    </b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="Contact No.">
                    <b-input v-model="fields.mother_contact_no"
                             placeholder="Contact No."></b-input>
                </b-field>
            </div>
        </div>

        <!-- SPOUSE -->
        <div class="columns">
            <div class="column">
                <b-field label="Spouse Name" expanded>
                    <b-input type="text" v-model="fields.spouse_name"
                             placeholder="Spouse Name">
                    </b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="Address" expanded>
                    <b-input type="text" v-model="fields.spouse_address"
                             placeholder="Address">
                    </b-input>
                </b-field>
            </div>
            <div class="column">
                <b-field label="Contact No.">
                    <b-input v-model="fields.spouse_contact_no"
                        placeholder="Contact No."></b-input>
                </b-field>
            </div>
        </div>

        <div class="buttons is-right">
            <b-button label="Save information"
                @click="submit"
                icon-right="arrow-right"
                class="is-primary">
            </b-button>
        </div>
    </div> <!--root div-->

</template>

<script>
export default {
 
    data(){
        return{
            admission_type: '',

            fields: {
                
                patient_id: 0,
                lname : '',
                fname : '',
                mname : '',
                suffix : '',
              
                per_address : '',
                contact_no : '',
                sex : '',
                civil_status : '',
                bdate : null,
                age : '',
                birthplace : '',
                nationality : '',
                religion : '',
                occupation : '',

                employer : '',
                employer_address : '',
                employer_contact_no : '',
                father_name : '',
                father_address : '',
                father_contact_no : '',

                mother_maiden_name : '',
                mother_address : '',
                mother_contact_no : '',

                spouse_name : '',
                spouse_address : '',
                spouse_contact_no : '',

            },
            errors: {},

            patient_id: 0,

            nationalities: [],
            religions: [],
        }
    },

    methods: {

        clearFields(){
            this.fields = {
                admission_type: this.admission_type,
                patient_id: 0,
                lname : '',
                fname : '',
                mname : '',
                suffix : '',
                ward_room : '',
                per_address : '',
                contact_no : '',
                sex : '',
                civil_status : '',
                bdate : null,
                age : '',
                birthplace : '',
                nationality : '',
                religion : '',
                occupation : '',

                employer : '',
                employer_address : '',
                employer_contact_no : '',
                father_name : '',
                father_address : '',
                father_contact_no : '',

                mother_maiden_name : '',
                mother_address : '',
                mother_contact_no : '',

                spouse_name : '',
                spouse_address : '',
                spouse_contact_no : '',

            };
            this.errors = {}
        },

        changeEvent(){
            if(this.fields.admission_type === 'NEW'){
                this.clearFields()
            }
        },

        loadNationalities(){
            axios.get('/load-open-nationalities').then(res=>{
                this.nationalities = res.data
            }).catch(err=>{

            })
        },

        loadReligions(){
            axios.get('/load-open-religions').then(res=>{
                this.religions = res.data
            }).catch(err=>{

            })
        },

        emitPatient(row){
            this.fields.patient_id = row.patient_id;
            this.fields.lname = row.lname;
            this.fields.fname = row.fname;
            this.fields.mname = row.mname;
            this.fields.suffix = row.suffix;
            //this.fields.ward_room = row.ward_room;
            this.fields.per_address = row.per_address;
            this.fields.contact_no = row.contact_no;
            this.fields.sex = row.sex;
            this.fields.civil_status = row.civil_status;
            this.fields.bdate = new Date(row.bdate);
            this.fields.age = row.age;
            this.fields.birthplace = row.birthplace;
            this.fields.nationality = row.nationality;
            this.fields.religion = row.religion;
            this.fields.occupation = row.occupation;

            this.fields.employer = row.employer;
            this.fields.employer_address = row.employer_address;
            this.fields.employer_contact_no = row.employer_contact_no;

            this.fields.father_name = row.father_name;
            this.fields.father_address = row.father_address;
            this.fields.father_contact_no = row.father_contact_no;

            this.fields.mother_maiden_name = row.mother_maiden_name;
            this.fields.mother_address = row.mother_address;
            this.fields.mother_contact_no = row.mother_contact_no;

            this.fields.spouse_name = row.spouse_name;
            this.fields.spouse_address = row.spouse_address;
            this.fields.spouse_contact_no = row.spouse_contact_no;

        },


        submit: function(){
            
            let ndate = new Date(this.fields.bdate);
            this.fields.birthdate = ndate.getFullYear() + '-' + (ndate.getMonth() + 1) + '-' + ndate.getDate() 
            this.fields.admission_type = this.admission_type;


            axios.post('/patient-profile', this.fields).then(res=>{
               
                if(res.data.status == 'saved'){
                    this.$buefy.dialog.alert({
                        title: 'SAVED!',
                        message: 'Successfully saved.',
                        type: 'is-success',
                        confirmText: 'OK',
                        onConfirm: () => {
                            this.isModalCreate = false;
                            this.clearFields()
                            this.$emit('emitPatientData', res.data.data);
                        }
                    })
                }
            }).catch(err=>{
                if(err.response.status === 422){
                    this.errors = err.response.data.errors;
                }
            })
        }
    },

    mounted(){
        this.loadNationalities()
        this.loadReligions()
    }
}
</script>