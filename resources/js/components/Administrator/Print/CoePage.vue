<template>
<div>

    <div class="buttons">
        <button  class="button is-danger" @click="back">Back</button>
    </div>

    <div class="coe" v-for="(item, index) in propData"
        :key="index">
        <div class="header">
            <img class="img-header" src="/img/print-header.png" />
        </div>

        <hr>

        <div class="header-text has-text-centered">
            <div class="has-text-weight-bold">CERTIFICATE OF ENROLMENT</div>
            <div class="">{{ item.academic_year.academic_year_desc }}</div>
        </div>

        <div class="student-info">
            <div class="info-left" v-if="item.learner">
                <table>
                    <tr>
                        <td>LRN</td>
                        <td>:
                            <span>
                                {{ item.learner.lrn }}
                            </span>
                           
                        </td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>:
                            <span>
                                {{ item.learner.lname }}, {{ item.learner.fname }} {{ item.learner.mname }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Track</td>
                        <td>:
                            <span v-if="item.track">
                                {{ item.track.track }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Grade Level</td>
                        <td>:
                            <span>{{ item.grade_level }}</span>
                        </td>
                    </tr>
                </table>

            </div>
            <div class="info-right">
                <table>
                    <tr>
                        <td>Strand</td>
                        <td>:
                            <span v-if="item.strand">
                                {{ item.strand.strand }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Specialization</td>
                        <td>:

                        </td>
                    </tr>
                    <tr>
                        <td>Section</td>
                        <td>:
                            <span v-if="item.section">
                                {{ item.section.section }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Date enroled</td>
                        <td>:
                            <span v-if="item.date_enroled">
                                {{ item.date_enroled }}
                            </span>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </div>


</div>
</template>

<script>

export default{
    props: {

        propData: {
            type: Array,
            default: '',
        },
    },


    data(){

        return {
            students: [],
        }
    },

    methods: {
        initData(){
            this.students = this.propData
            console.log(this.students)
        },

        back(){
            history.back()
        }
    },

    mounted(){
        this.initData()
    }
}
</script>

<style scoped>
    table > tr > td:first-child {
        width: 120px;
    }

    table > tr > td {
        margin-left: 10px;
    }

    .info-left{
        flex: 1;
    }
    .info-right{
        display: flex;
        justify-content: flex-end;
        flex: 1;
    }

</style>