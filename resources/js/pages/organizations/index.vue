<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import {
  Table,
  TableBody,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from '@/components/ui/table'
import { Organization } from '@/types/organization';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Organisations',
        href: '/organisations',
    },
];

defineProps<{
    organizations: Organization[];
}>()

</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex flex-col flex-1 h-full gap-4 p-4 rounded-xl">
           <!-- <div class="grid gap-4 auto-rows-min md:grid-cols-3">
               <div class="relative overflow-hidden border aspect-video rounded-xl border-sidebar-border/70 dark:border-sidebar-border">
                   <PlaceholderPattern />
               </div>
               <div class="relative overflow-hidden border aspect-video rounded-xl border-sidebar-border/70 dark:border-sidebar-border">
                   <PlaceholderPattern />
               </div>
               <div class="relative overflow-hidden border aspect-video rounded-xl border-sidebar-border/70 dark:border-sidebar-border">
                   <PlaceholderPattern />
               </div>
           </div> -->
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min p-5">
                <div class="grid grid-cols-2">
                    <div class="head">
                        <h1 class="font-bold">Liste des organisations</h1>
                    </div>

                    <div class="flex justify-end action">
                        <!-- Register -->
                        <Button as="a" href="#">
                            Créer une organisation
                        </Button>
                    </div>
                </div>

                <div class="grid">
                    <Table>
                        <TableHeader>
                            <TableRow>
                                <TableHead>#</TableHead>
                                <TableHead>Nom</TableHead>
                                <TableHead>Proprietaire</TableHead>
                                <TableHead>Type</TableHead>
                                <TableHead>Status</TableHead>
                                <TableHead class="text-right">Action</TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            <template v-for="(item, index) in organizations" :key="index">
                                <TableRow>
                                    <TableCell class="font-medium">{{ index + 1 }}</TableCell>
                                    <TableCell>{{ item.name }}</TableCell>
                                    <TableCell>{{ item.owner.firstname }} {{ item.owner.lastname }}</TableCell>
                                    <TableCell>{{ item.organization_type.name_fr }}</TableCell>
                                    <TableCell>{{ item.status }}</TableCell>
                                    <TableCell class="text-right">
                                        Modifier
                                    </TableCell>
                                </TableRow>
                            </template>
                        </TableBody>
                    </Table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
