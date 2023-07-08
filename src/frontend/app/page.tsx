import { apiServer } from "@/utils/api";

export default async function Home() {
  const data = await apiServer.get<any[]>("job_categories");
  console.log(data);
  return <div>Hello World</div>;
}
