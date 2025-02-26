import { acceptHMRUpdate, defineStore } from "pinia";
import { ref } from "vue";

export const useSiginUpStore=defineStore('siginup-store',()=>{

    const currentStep=ref("currentStep")

    const step1=ref("step1")
    const step2=ref("step2")
    const step3=ref("step3")

    function moveStep1(){
        currentStep.value=step2.value
    }
    function moveStep2(){
        currentStep.value=step1.value
    }
    function moveStep3(){
        currentStep.value=step3.value
    }

    return {
        step1,
        step2,
        step3,
        currentStep,
        moveStep1,
        moveStep2,
        moveStep3,
    }
});

if(import.meta.hot){
    import.meta.hot.accept(acceptHMRUpdate(useSiginUpStore,import.meta.hot))
}
