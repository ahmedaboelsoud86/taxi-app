<template>
    <h2> Name : {{  userData?.user.name  }}</h2>
    <button @click="loginStore.logout">LogOut</button>
    <div class="nav">
        <ul>
            <li>Home</li>
            <li>PayMent</li>
            <li>LogOut</li>
        </ul>
    </div>
</template>
<script setup>
import { getUserData } from "../../../helper/utils";
import { useLoginStore } from "../../../store/login-store";


const loginStore=useLoginStore()
const userData=getUserData()

</script>
<style>
.nav{
    background-color: rgb(252, 252, 252);
    border: solid 1px #cfcfcf;
    color: #193ddf;
    font-size: 20px;
}
</style>
