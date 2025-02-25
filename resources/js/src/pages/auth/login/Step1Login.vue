<script setup>
import { onMounted } from "vue";
import { useLoginStore } from '../../../store/login-store'

const loginStore=useLoginStore()

    onMounted(() => {

    })
</script>

<template>
    <div>
        <div class="mb-3 mt-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
        <button  @click="loginStore.next" class="btn btn-primary">Next</button>

    </div>
</template>
