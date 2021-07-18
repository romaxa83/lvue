import {Role} from "@/classes/role";
import {Entity} from "@/interfaces/entity";

export class User implements Entity{
    id: number;
    name: string;
    email: string;
    role: Role;
    permissions: string[];

    constructor(
        id = 0,
        name = '',
        email = '',
        role = new Role(),
        permissions: string[] = []
    ) {
        this.id = id;
        this.name = name;
        this.email = email;
        this.role = role;
        this.permissions = permissions;
    }
}