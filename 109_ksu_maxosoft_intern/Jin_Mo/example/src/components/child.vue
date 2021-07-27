<template>
    <div class="card border-dark">
        <div class="card-header">
            <b> {{ data.name }} 的履歷表 </b>
        </div>
        <div class="card-body">
            <img src="../assets/profile-photo.jpg" alt="photo">
            <p>電話： {{ data.phone }}</p>
            <p>住址：{{ data.address }}</p>
            <p>自我介紹：{{ data.msg }}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: 'child',
    props: [
        'data'
    ]
}
</script>

<style>
.resume {
    width: 10%;
    margin: 1em;
}
p {
    text-align: left;
}
img {
    height: 50%;
    width: 50%;
}
</style>