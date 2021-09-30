# Vercel Deployment

Deploys to Vercel for Next.js projects using the specified Hook / URL provided when new content is
created or existing content is updated.

## Configuration

The environment variable `VERCEL_WEBHOOK_URL` needs to be set to the proper webhook URL.

## Other

By default Vercel optimises the deployment process by cancelling previous deployments:

- https://vercel.com/docs/concepts/git/deploy-hooks#other-optimizations
