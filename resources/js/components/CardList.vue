<template>
    <div class="flex flex-row border-b-2 py-2 border-slate-100 justify-between">
        <img class="h-12 w-12 object-cover rounded-full" :src="user.image" alt="user">
        <div class="flex flex-col box__info grow px-2">
            <h5 class="text-lg w-full">{{user.name}}</h5>
        </div>
    </div>
</template>
<script>
export default {
    props:['user']
}
</script>
<style lang="scss" scoped>

</style>