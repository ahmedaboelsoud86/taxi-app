import { acceptHMRUpdate, defineStore } from "pinia";
import { ref } from "vue";
import { useVuelidate } from '@vuelidate/core'
import { required, email } from '@vuelidate/validators'

export const useSiginUpStore=defineStore('siginup-store',()=>{

    const currentStep=ref("currentStep")

    const step1Input=ref({name:'',email:''})
    const step2Input=ref({password:''})
    const step3Input=ref({otp_code:''})

    const ruleStep1Input={
        name:{required},
        email:{required,email},
    }
    const ruleStep2Input={
        password:{required},
    }
    const ruleStep3Input={
        otp_code:{required},
    }

    const vStep1$ =  useVuelidate(ruleStep1Input,step1Input)
    const vStep2$ =  useVuelidate(ruleStep2Input,step2Input)
    const vStep3$ =  useVuelidate(ruleStep3Input,step3Input)



    const step1=ref("step1")
    const step2=ref("step2")
    const step3=ref("step3")

    async function moveStep1(){
        const valid=await vStep1$.value.$validate()
        if(!valid) return
        currentStep.value=step2.value
    }
    async function moveStep2(){

        currentStep.value=step1.value
    }
    async function moveStep3(){
        const valid=await vStep2$.value.$validate()
        if(!valid) return
        currentStep.value=step3.value
    }

    return {
        step1,
        step2,
        step3,
        step1Input,
        step2Input,
        step3Input,
        vStep1$,
        vStep2$,
        vStep3$,
        moveStep1,
        moveStep2,
        moveStep3,
        currentStep,
    }
});

if(import.meta.hot){
    import.meta.hot.accept(acceptHMRUpdate(useSiginUpStore,import.meta.hot))
}
