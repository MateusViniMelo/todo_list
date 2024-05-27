import { ILinkResponse } from "./ILinkResponse";
import { ITask } from "./ITask";

export interface ITaskResponse {
    current_page: number;
    data?: ITask[];
    first_page_url: string;
    from: number;
    last_page: number;
    last_page_url: string;
    links: ILinkResponse[];
    next_page_url?: string;
    path: string;
    per_page: number;
    prev_page_url?: string;
    to?: number;
    total: number;
}
