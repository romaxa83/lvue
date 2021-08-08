import {Entity} from "@/interfaces/entity";
import {OrderItem} from "@/classes/order_item";

export class Order implements Entity{
    id: number;
    name: string;
    email: string;
    items: OrderItem[];

    constructor(
        id = 0,
        name = '',
        email = '',
        items = [],
    ) {
        this.id = id;
        this.name = name;
        this.email = email;
        this.items = items;
    }
}