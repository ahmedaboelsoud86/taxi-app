<template>
    <div>
        <div class="mb-3 mt-3">
            <label for="email">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button @click="loginStore.previous" class="btn btn-primary">Previous</button> |
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</template>
<script setup>
import { onMounted } from "vue";
import { useLoginStore } from '../../../store/login-store'
const loginStore=useLoginStore()
    onMounted(() => {

    })
</script>
