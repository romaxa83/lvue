export class User{
    id: number;
    name: string;
    email: string;
    revenue: number;

    constructor(json: any = null) {
        this.id = json?.id;
        this.name = json?.name;
        this.email = json?.email;
        this.revenue = json?.revenue;
    }
}