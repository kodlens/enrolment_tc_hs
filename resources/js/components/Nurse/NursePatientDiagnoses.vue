<template>
    <div>
        <div class="section">
            <div class="columns is-centered">
                <div class="column is-10-desktop">
                    <div class="box">

                        <div class="table-text">DIAGNOSE OF {{ patient.lname }}, {{ patient.fname }}</div>

                        <!-- <b-field label="Search" label-position="on-border">
                            <b-input type="text"
                                        v-model="search.lname" placeholder="Last Name"
                                        @keyup.native.enter="loadAsyncData"/>
                            <b-input type="text"
                                    v-model="search.fname" placeholder="First Name"
                                    @keyup.native.enter="loadAsyncData"/>
                            <p class="control">
                                    <b-tooltip label="Search" type="is-success">
                                <b-button type="is-primary" icon-right="magnify" @click="loadAsyncData"/>
                                    </b-tooltip>
                            </p>
                        </b-field> -->

                        <!-- <div class="buttons is-right mt-3">
                            <b-button tag="a" icon-left="account" 
                                :href="`/nurse-patient/create?lname=${search.lname}&fname=${search.fname}`"
                                class="is-primary is-small">New Patient</b-button>
                        </div> -->

                        <b-table
                            :data="data"
                            :loading="loading"
                            paginated
                            backend-pagination
                            :total="total"
                            :pagination-rounded="true"
                            :per-page="perPage"
                            @page-change="onPageChange"
                            aria-next-label="Next page"
                            aria-previous-label="Previous page"
                            aria-page-label="Page"
                            aria-current-label="Current page"
                            backend-sorting
                            :default-sort-direction="defaultSortDirection"
                            @sort="onSort">

                            <b-table-column field="patient_diagnose_id" label="ID" sortable v-slot="props">
                                {{ props.row.patient_diagnose_id }}
                            </b-table-column>

                            <b-table-column field="date_admission" label="Admission Date" sortable v-slot="props">
                                {{ props.row.date_admission }}
                            </b-table-column>

                            <b-table-column field="present_complain" label="Present Complain" sortable v-slot="props">
                                {{ props.row.present_complain }}
                            </b-table-column>

                            <b-table-column field="admission_diagnose" label="Admission Diagnose" sortable v-slot="props">
                                {{ props.row.admission_diagnose }}
                            </b-table-column>

                            <b-table-column label="Action" v-slot="props">
                                <div class="is-flex">

                                    <b-dropdown aria-role="list">
                                        <template #trigger="{ active }">
                                            <b-button
                                                label="Option"
                                                type="is-primary"
                                                class="is-small"
                                                :icon-right="active ? 'menu-up' : 'menu-down'" />
                                        </template>


                                        <b-dropdown-item aria-role="listitem" :href="`/nurse-patient-diagnose-doctor-orders/${props.row.patient_diagnose_id}`">
                                            Doctor Order
                                        </b-dropdown-item>

                                    </b-dropdown>
                                    
                                    
                                  
                                </div>
                            </b-table-column>
                        </b-table>

                        <div class="columns">
                            <div class="column">
                                <b-field label="Page" label-position="on-border">
                                    <b-select v-model="perPage" @input="setPerPage" class="is-small">
                                        <option value="5">5 per page</option>
                                        <option value="10">10 per page</option>
                                        <option value="15">15 per page</option>
                                        <option value="20">20 per page</option>
                                    </b-select>
                                </b-field>
                            </div>
                        </div>

                    </div>
                </div><!--col -->
            </div><!-- cols -->
        </div><!--section div-->



        <!--modal reset password-->
        <b-modal v-model="modalDiagnose" has-modal-card
                 trap-focus
                 :width="640"
                 aria-role="dialog"
                 aria-label="Modal"
                 aria-modal>

            <form @submit.prevent="submitDiagnose">
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Diagnose Information</p>
                        <button
                            type="button"
                            class="delete"
                            @click="modalDiagnose = false"/>
                    </header>

                    <section class="modal-card-body">
                        <div class="">
                            <div class="columns">
                                <div class="column">

                                    <b-field label="Present Complain" label-position="on-border"
                                             :type="this.errors.present_complain ? 'is-danger':''"
                                             :message="this.errors.present_complain ? this.errors.present_complain[0] : ''">
                                        <b-input type="textarea" v-model="fields.present_complain"
                                                 placeholder="Present Complain">
                                        </b-input>
                                    </b-field>

                                    <b-field label="Admission Diagnose" label-position="on-border"
                                             :type="this.errors.admission_diagnose ? 'is-danger':''"
                                             :message="this.errors.admission_diagnose ? this.errors.admission_diagnose[0] : ''">
                                        <b-input type="textarea" v-model="fields.admission_diagnose"
                                                 placeholder="Admission Diagnose">
                                        </b-input>
                                    </b-field>

                                    <b-field label="Principal Diagnose" label-position="on-border"
                                        :type="this.errors.principal_diagnose ? 'is-danger':''"
                                        :message="this.errors.principal_diagnose ? this.errors.principal_diagnose[0] : ''">
                                        <b-input type="textarea" v-model="fields.principal_diagnose"
                                            placeholder="Principal Diagnose">
                                        </b-input>
                                    </b-field>

                                    <b-field label="Doctor" label-position="on-border"
                                        :type="this.errors.doctor ? 'is-danger':''"
                                        :message="this.errors.doctor ? this.errors.doctor[0] : ''">
                                        <b-select v-model="fields.doctor"
                                            placeholder="Doctor">
                                            <option v-for="(item, index) in doctors" :key="index" 
                                                :value="item.user_id">{{ item.lname }}, {{ item.fname }} {{item.mname  }}</option>
                                        </b-select>
                                    </b-field>

                                </div>
                            </div>
                        </div>
                    </section>
                    <footer class="modal-card-foot">
                        <b-button
                            label="Close"
                            @click="modalDiagnose=false"/>
                        <button
                            class="button is-primary">SAVE</button>
                    </footer>
                </div>
            </form><!--close form-->
        </b-modal>
        <!--close modal-->

    </div>
</template>

<script>

export default{
    props: ['propPatientId', 'propPatient'],
    data() {
        return{
            data: [],
            total: 0,
            loading: false,
            sortField: 'patient_id',
            sortOrder: 'desc',
            page: 1,
            perPage: 10,
            defaultSortDirection: 'asc',


        
            search: {
                lname: '',
                fname: '',
            },



            modalDiagnose: false,
            

            fields: {
                patient_id: 0, 
                date_admission: null,
                admission_diagnose: '',
                principal_diagnose: '',
                doctor_id: 0,
            },

            errors: {},
            doctors: [],


            patient: {},
        }

    },

    methods: {
        /*
        * Load async data
        */
        loadAsyncData() {
            const params = [
                `sort_by=${this.sortField}.${this.sortOrder}`,
                `lname=${this.search.lname}`,
                `fname=${this.search.fname}`,
                `perpage=${this.perPage}`,
                `page=${this.page}`
            ].join('&')

            this.loading = true
            axios.get(`/get-nurse-patient-diagnoses/${this.propPatientId}?${params}`)
                .then(({ data }) => {
                    this.data = [];
                    let currentTotal = data.total
                    if (data.total / this.perPage > 1000) {
                        currentTotal = this.perPage * 1000
                    }

                    this.total = currentTotal
                    data.data.forEach((item) => {
                        //item.release_date = item.release_date ? item.release_date.replace(/-/g, '/') : null
                        this.data.push(item)
                    })
                    this.loading = false
                })
                .catch((error) => {
                    this.data = []
                    this.total = 0
                    this.loading = false
                    throw error
                })
        },
        /*
        * Handle page-change event
        */
        onPageChange(page) {
            this.page = page
            this.loadAsyncData()
        },

        onSort(field, order) {
            this.sortField = field
            this.sortOrder = order
            this.loadAsyncData()
        },

        setPerPage(){
            this.loadAsyncData()
        },

        openModal(){
            this.isModalCreate=true;
            this.fields = {};
            this.errors = {};
        },

        //alert box ask for deletion
        confirmDelete(delete_id) {
            this.$buefy.dialog.confirm({
                title: 'DELETE!',
                type: 'is-danger',
                message: 'Are you sure you want to delete this data?',
                cancelText: 'Cancel',
                confirmText: 'Delete',
                onConfirm: () => this.deleteSubmit(delete_id)
            });
        },
        //execute delete after confirming
        deleteSubmit(delete_id) {
            axios.delete('/nurse-patient/' + delete_id).then(res => {
                this.loadAsyncData();
                this.clearFields()
            }).catch(err => {
                if (err.response.status === 422) {
                    this.errors = err.response.data.errors;
                }
            });
        },

        clearFields(){
  
            this.fields = {
                patient_id: 0, 
                date_admission: null,
                admission_diagnose: '',
                principal_diagnose: '',
                doctor_id: 0,
            };
        },


        //update code here
        getData: function(data_id){
            this.clearFields();
            this.global_id = data_id;
            this.isModalCreate = true;

            //nested axios for getting the address 1 by 1 or request by request
            axios.get('/designations/'+data_id).then(res=>{
                this.fields = res.data;
            });
        },

        initData(){
            this.patient = JSON.parse(this.propPatient)
        },

        openModalDiagnose(row){
            this.modalDiagnose = true
            this.fields = {
                patient_id: row.patient_id, 
            };
        },

        submitDiagnose(){
            axios.post('/nurse-patient-submit-diagnose', this.fields).then(res=>{
                if(res.data.status === 'saved'){
                    this.$buefy.dialog.alert({
                        title: 'Saved!',
                        message: 'Successfully saved.',
                        type: 'is-success',
                        onConfirm: () => {
                            this.loadAsyncData();
                            this.clearFields();
                            this.modalDiagnose = false;
                        }
                    })
                }
            }).catch(err=>{
            
            })
        }


    },

    mounted() {
        this.loadAsyncData()
        this.initData()
    }

}


</script>


<style>

    .table > tbody > tr {
        /* background-color: blue; */
        transition: background-color 0.5s ease;
    }

    .table > tbody > tr:hover {
        background-color: rgb(233, 233, 233);
    }

</style>
