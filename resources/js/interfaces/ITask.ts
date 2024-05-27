export interface ITask {
    id?: number;
    title: string;
    description?: string;
    date: Date;
    is_completed: boolean;
    is_important: boolean;
    user_id: number;
}
