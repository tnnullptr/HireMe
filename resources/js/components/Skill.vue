<template>
    <div>
        <li class="list-group-item" :data-target="'#collapse_skill_'+skill2.id">
            ({{skill2.id}}) {{skill2.title}}
            <i class="fa fa-check-circle text-success"
               data-toggle="tooltip" data-placement="top" title="Verified Skill Type"
               v-if="skill2.verified === 1"></i>
            <i class="fa fa-times-circle text-danger"
               data-toggle="tooltip" data-placement="top" title="Rejected Skill Type"
               v-else-if="skill2.verified === 0"></i>
        </li>
        <div >
            <div class="form-group">
                <div class="btn-group w-100" v-if="admin" role="group">
                    <button type="button" data-status="1" :data-title="skill2.title" @click="accept($event)" class="btn btn-success">
                        <i class="fa fa-check-circle "
                           data-toggle="tooltip" data-placement="top"
                           title="Verified Skill Type"
                        ></i>
                    </button>
                    <button type="button" data-status="0" :data-title="skill2.title" @click="accept($event)" class="btn btn-danger">
                        <i class="fa fa-times-circle "
                           data-toggle="tooltip" data-placement="top"
                           title="Rejected Skill Type"
                        ></i>
                    </button>
                </div>
            </div>
        </div>
        <br>
    </div>
</template>

<script>
export default {
    name: "Skill",
    props: ['skill','admin','accept-endpoint'],
    mounted() {
        this.skill2 = JSON.parse(this.skill);
        //window.alert(this.skill2)
    },
    data(){
        return {
            'skill2':{}
        }
    },
    methods:{
        accept(e){
            var that = this
            axios.post(that.acceptEndpoint, {
                'status': Number(e.currentTarget.dataset.status),
                'title':e.currentTarget.dataset.title,
                'id': that.skill.id
            }).then((res) => {
                //console.table(res.data)
                console.log("Saved Update")
                alert(res.data.msg )
                location.reload()
            }).catch((error) => {
                console.error(error)
            })
        }
    }
}
</script>

<style scoped>

</style>
