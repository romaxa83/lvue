import {Role} from "@/classes/role";
import {Entity} from "@/interfaces/entity";

export class User implements Entity{
    id: number;
    name: string;
    email: string;
    role: Role;

    constructor(
        id = 0,
        name = '',
        email = '',
        role = new Role()
    ) {
        this.id = id;
        this.name = name;
        this.email = email;
        this.role = role;
    }

    get fullName(){
        return this.name + ' - ' + this.role.name;
    }

    canView(page: string){
        return this.role.permissions.some(p => p.name === `view_${page}`)
    }

    canEdit(page: string){
        return this.role.permissions.some(p => p.name === `edit_${page}`)
    }
}