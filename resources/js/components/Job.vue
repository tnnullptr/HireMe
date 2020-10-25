<template>
    <div class="card w-100">
        <div class="card-header">
            {{job2.name}}
        </div>
        <div class="card-body">
            <p class="card-text">{{job2.context}} </p>
        </div>
        <div class="card-footer">
            <p class="card-subtitle mb-2 text-muted"><i class="fa fa-money"></i> {{job2.salary}}</p>
            <p class="card-subtitle mb-2 text-muted"><i class="fa fa-location-arrow"></i> {{job2.location}} </p>
            <p class="card-subtitle mb-2 text-muted"><i class="fa fa-bookmark"></i> {{job2.type == "PARTTIME" ? "兼職" : job2.type == "FULLTIME" ? "全職" : "政府官方"}} </p>
            <button @click="deleteJob" class="btn btn-danger">Delete</button>
            <!--<p class="card-subtitle mb-2 text-muted"><i class="fa fa-bookmark"></i> {{skills}} </p>-->
        </div>
    </div>
</template>

<script>
export default {
    name: "Job",
    props: ['jobs','admin','skill','delete-endpoint'],
    mounted() {
        this.job2 = JSON.parse(this.jobs);
        this.skills = JSON.parse(this.skill);
    },
    data(){
        return {
            'job2':{},
            'skills':[]
        }
    },
    methods:{
        deleteJob(){
            var that = this
            axios.post(that.deleteEndpoint, {
                'id': that.job2.id
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
