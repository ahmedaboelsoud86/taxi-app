<script setup>

import { storeToRefs } from "pinia";
import InputErrors from "../../../components/base-components/Input-errors.vue";
import { useLoginStore } from '../../../store/login-store'

const loginStore = useLoginStore()
const {vStep2$,  step2Input } = storeToRefs(loginStore)

</script>
<template>
    <div>
        <Loading :loading="loading" />
        <div class="mb-3 mt-3">
            <InputErrors :errors="vStep2$.password.$errors">
                <input type="password" v-model="step2Input.password" class="form-control" placeholder="Enter password">
            </InputErrors>
        </div>
        <button @click="loginStore.previous" class="btn btn-primary">Previous</button> |
        <button @click="loginStore.signin" class="btn btn-primary">Sign In</button>
    </div>
</template>
