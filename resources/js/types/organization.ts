import { OrganizationType, Person } from '.';

export interface Organization {
    id: number;
    name: string;
    email: string;
    country_id: number;
    owner: Person;
    owner_id: number;
    phone: string;
    code: string;
    status: string;
    logo: string;
    address_id: number;
    parent_id: number;
    organization_type_id: number;
    organization_type: OrganizationType;
    created_at: string;
    updated_at: string;
}
