
## Explanation

I used Laravel to get all the necessary data from the provided APIs, which allows for a simple approach data management. By combining data from these different sources, I put together a frontend-friendly response. This way, the frontend doesn't have to deal directly with retrieving data from multiple APIs, which can be slow and error-prone. Instead, it receives a single, merge response that is easier for the data handling process, ensuring a smoother and better user experience. This integration not only reduces the potential for errors but also optimizes performance, as it minimizes the number of requests the frontend needs to make.

benifits:
frontend won't be too slow because it's server side rendering.
it is easy to handle the data because it has been merged in the backend before sending to the frontend.