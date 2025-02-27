<script setup>

import { storeToRefs } from "pinia";
import InputErrors from "../../../components/base-components/Input-errors.vue";
import { useLoginStore } from '../../../store/login-store'

const loginStore = useLoginStore()

const {vStep1$,  step1Input } = storeToRefs(loginStore)


</script>

<template>
    <div>
        <div class="mb-3 mt-3">
            <label for="email">Email:</label>
            <InputErrors :errors="vStep1$.email.$errors">
                <input type="text" v-model="step1Input.email" class="form-control" placeholder="Enter Email">
            </InputErrors>
        </div>
        <button @click="loginStore.next" class="btn btn-primary">Next</button>

    </div>
</template>


