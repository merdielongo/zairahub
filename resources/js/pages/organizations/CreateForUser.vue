<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Country, OrganizationType } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

defineProps<{
    organizationTypes: OrganizationType[];
    countries: Country[];
}>()

const form = useForm({
    category: 'm',
    name: '',
    phone: '',
    email: '',
});

const submit = () => {
    form.post(route('organizations.store'), {
        onFinish: () => form.reset('name', 'phone', 'email'),
    });
};
</script>

<template>
    <AuthBase title="Créer votre organisation" description="Enter your details below to create your organization">
        <Head title="Register" />

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">

                <div class="grid gap-2">
                    <Label for="name">Nom de l'organisation</Label>
                    <Input id="name" type="name" required :tabindex="2" autocomplete="name" v-model="form.name" placeholder="Entre le nom de l'organisation" />
                    <InputError :message="form.errors.name" />
                </div>

                <div class="grid gap-2">
                    <Label for="category">Type d'organisation</Label>
                    <select class="input" v-model="form.category">
                        <option disabled>Selectionner une categorie</option>
                        <template v-for="(item, index) in organizationTypes" :key="index">
                            <option :value="item.id">{{ item.name_fr }}</option>
                        </template>
                    </select>
                    <InputError :message="form.errors.category" />
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div class="grid gap-2">
                        <Label for="phone">Téléphone</Label>
                        <Input id="phone" type="phone" required :tabindex="2" autocomplete="phone" v-model="form.phone" placeholder="Entre votre téléphone" />
                        <InputError :message="form.errors.phone" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="email">Email</Label>
                        <Input id="email" type="email" required :tabindex="2" autocomplete="email" v-model="form.email" placeholder="exemple@hub.com" />
                        <InputError :message="form.errors.email" />
                    </div>
                </div>

                <div class="grid gap-2">
                    <Label for="category">Pays</Label>
                    <select class="input" v-model="form.category">
                        <option disabled>Selectionner un pays</option>
                        <template v-for="(item, index) in countries" :key="index">
                            <option :value="item.id">{{ item.name }}</option>
                        </template>
                    </select>
                    <InputError :message="form.errors.category" />
                </div>

                <Button type="submit" class="w-full mt-2" tabindex="5" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="w-4 h-4 animate-spin" />
                    Créer votre organisation
                </Button>
            </div>
        </form>
    </AuthBase>
</template>
