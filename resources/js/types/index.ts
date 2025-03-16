import type { PageProps } from '@inertiajs/core';
import type { LucideIcon } from 'lucide-vue-next';

export interface Auth {
    user: User;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface NavItem {
    title: string;
    href: string;
    icon?: LucideIcon;
    isActive?: boolean;
    roles?: string[];
}

export interface SharedData extends PageProps {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
}

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    roles?: Role[];
    person: Person;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
}

export interface Person {
    firstname: string;
    lastname: string;
    middlename?: string;
    gender: string;
    person_type_id?: number;
}

export interface Role {
    id: number;
    name: string;
    guard_name: string;
    created_at: string;
    updated_at: string;
}

export interface OrganizationType {
    id: number;
    name_fr: string;
    name_en: string;
    created_at: string;
    updated_at: string;
}

export interface Country {
    id: number;
    name: string;
    prefix: string;
    phone_code: string;
    created_at: string;
    updated_at: string;
}

export type BreadcrumbItemType = BreadcrumbItem;
