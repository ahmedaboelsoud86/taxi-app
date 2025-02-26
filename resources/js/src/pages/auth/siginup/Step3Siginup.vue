<template>
    <div>
        <div class="mb-3 mt-3">
            <label for="email">Pass5555word ( 3 ):</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button @click="siginUpStore.moveStep1" class="btn btn-secondary">Previous</button> |
        <button type="submit" class="btn btn-primary">Sign up </button>
    </div>
</template>
<script setup>
import { onMounted } from "vue";
import { useSiginUpStore } from '../../../store/siginup-store'
const siginUpStore=useSiginUpStore()
    onMounted(() => {

    })
</script>
