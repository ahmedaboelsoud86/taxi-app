<template>
    <div>
        <div class="mb-3 mt-3">
            <label for="email">Email (1):</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
        <button @click="siginUpStore.moveStep1" class="btn btn-primary">Next</button>

    </div>
</template>
<script setup>
import { onMounted } from "vue";
import { useSiginUpStore } from '../../../store/siginup-store'

const siginUpStore = useSiginUpStore()

onMounted(() => {


})
</script>
