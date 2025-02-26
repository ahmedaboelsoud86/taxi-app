import { acceptHMRUpdate, defineStore } from "pinia";
import { ref } from "vue";
import { useVuelidate } from '@vuelidate/core'
import { required, email } from '@vuelidate/validators'

export const useSiginUpStore=defineStore('siginup-store',()=>{

    const currentStep=ref("currentStep")

    const step1Input=ref({name:'',email:''})
    const ruleStep1Input={
        name:{required},
        email:{required,email},
    }

    const v$ =  useVuelidate(ruleStep1Input,step1Input)



    const step1=ref("step1")
    const step2=ref("step2")
    const step3=ref("step3")

    async function moveStep1(){
        const valid=await v$.value.$validate()
        if(!valid) return
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
        step1Input,
        v$,
        moveStep1,
        moveStep2,
        moveStep3,
    }
});

if(import.meta.hot){
    import.meta.hot.accept(acceptHMRUpdate(useSiginUpStore,import.meta.hot))
}
