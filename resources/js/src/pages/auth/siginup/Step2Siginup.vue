<script setup>

import { useSiginUpStore } from '../../../store/siginup-store'
import { storeToRefs } from "pinia";
import InputErrors from "../../../components/base-components/Input-errors.vue";
import Loading from "../../../components/base-components/loading.vue";


const siginUpStore = useSiginUpStore()
const { vStep2$, step2Input,loading } = storeToRefs(siginUpStore)


</script>

<template>
    <div>
        <Loading :loading="loading" />
        <div class="mb-3 mt-3">
            <InputErrors :errors="vStep2$.password.$errors">
                <input type="password" v-model="step2Input.password" class="form-control" placeholder="Enter password"
                    name="password" id="password">

            </InputErrors>
        </div>

        <button @click="siginUpStore.moveStep2" class="btn btn-secondary">Previous</button> |
        <button @click="siginUpStore.moveStep3" class="btn btn-primary">Next</button>

    </div>
</template>
