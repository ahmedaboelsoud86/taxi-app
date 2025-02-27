<template>
    <Loading :loading="loading" />
    <span>
        <a href="#">
            {{  step1Input.email }}
        </a>
    </span>
    <div>
        <InputErrors :errors="vStep3$.otp_code.$errors">
            <input type="text" v-model="step3Input.otp_code" class="form-control" placeholder="Enter otp_code"
                name="otp_code" id="otp_code">

        </InputErrors>
        <button @click="siginUpStore.moveStep1" class="btn btn-secondary">Previous</button> |
        <button @click="siginUpStore.signupUser" class="btn btn-primary">Sign up </button>
    </div>
</template>
<script setup>
import { onMounted } from "vue";
import { useSiginUpStore } from '../../../store/siginup-store'
import InputErrors from "../../../components/base-components/Input-errors.vue";
import Loading from "../../../components/base-components/loading.vue";
import { storeToRefs } from "pinia";
const siginUpStore = useSiginUpStore()
const { vStep3$, step3Input,step1Input,loading } = storeToRefs(siginUpStore)

onMounted(() => {

})
</script>
