<template>
    <div class="mb-3 mt-3">


        <InputErrors :errors="vStep1$.name.$errors">
            <input type="text" v-model="step1Input.name" class="form-control" placeholder="Enter Name" name="name"
                id="name">

        </InputErrors>

        <InputErrors :errors="vStep1$.email.$errors">
            <input type="email" v-model="step1Input.email" class="form-control" placeholder="Enter email" name="email"
                id="email">

        </InputErrors>


        <button @click="siginUpStore.moveStep1" class="btn btn-primary">Next</button>

    </div>
</template>
<script setup>

import { useSiginUpStore } from '../../../store/siginup-store'
import { storeToRefs } from "pinia";
import InputErrors from "../../../components/base-components/Input-errors.vue";


const siginUpStore = useSiginUpStore()
const { vStep1$, step1Input } = storeToRefs(siginUpStore)


</script>
