<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

const form = useForm({
    firstname: '',
    lastname: '',
    gender: 'm',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <AuthBase title="Create an account" description="Enter your details below to create your account">
        <Head title="Register" />

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">

                <div class="grid grid-cols-2 gap-6">
                    <div class="grid gap-2">
                        <Label for="firstname">Firstname</Label>
                        <Input id="firstname" type="text" required autofocus :tabindex="1" autocomplete="firstname" v-model="form.firstname" placeholder="First name" />
                        <InputError :message="form.errors.firstname" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="lastname">Lastname</Label>
                        <Input id="lastname" type="text" required autofocus :tabindex="1" autocomplete="lastname" v-model="form.lastname" placeholder="Last name" />
                        <InputError :message="form.errors.lastname" />
                    </div>
                </div>

                <div class="grid gap-2">
                    <Label for="gender">Gender</Label>
                    <select class="input" v-model="form.gender">
                        <option disabled>Select gender</option>
                        <option selected value="m">Homme</option>
                        <option value="f">Femme</option>
                    </select>
                    <InputError :message="form.errors.gender" />
                </div>

                <div class="grid gap-2">
                    <Label for="email">Email address</Label>
                    <Input id="email" type="email" required :tabindex="2" autocomplete="email" v-model="form.email" placeholder="email@example.com" />
                    <InputError :message="form.errors.email" />
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div class="grid gap-2">
                        <Label for="password">Password</Label>
                        <Input
                            id="password"
                            type="password"
                            required
                            :tabindex="3"
                            autocomplete="new-password"
                            v-model="form.password"
                            placeholder="Password"
                        />
                        <InputError :message="form.errors.password" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="password_confirmation">Confirm password</Label>
                        <Input
                            id="password_confirmation"
                            type="password"
                            required
                            :tabindex="4"
                            autocomplete="new-password"
                            v-model="form.password_confirmation"
                            placeholder="Confirm password"
                        />
                        <InputError :message="form.errors.password_confirmation" />
                    </div>
                </div>

                <Button type="submit" class="w-full mt-2" tabindex="5" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="w-4 h-4 animate-spin" />
                    Create account
                </Button>
            </div>

            <div class="text-sm text-center text-muted-foreground">
                Already have an account?
                <TextLink :href="route('login')" class="underline underline-offset-4" :tabindex="6">Log in</TextLink>
            </div>
        </form>
    </AuthBase>
</template>
