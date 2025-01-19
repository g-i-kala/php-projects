# PHP Projects - Portfolio

Welcome to my PHP Projects Portfolio! This repository serves as a central hub showcasing my various PHP projects. Each project is organized in its own directory as a Git submodule, allowing independent development and versioning while maintaining a unified structure for my portfolio.

## Repository Structure

```
php_projects/
├── project1/   # Submodule for the first PHP project
├── project2/   # Submodule for the second PHP project
└── project3/   # Submodule for the third PHP project
```

## Cloning the Repository

To clone this repository along with its submodules, use the following command:

```bash
git clone --recurse-submodules <repository_url>
```

If you have already cloned the repository without submodules, initialize and update them using:

```bash
git submodule update --init --recursive
```

## Adding a New Project

To add a new PHP project to my portfolio as a submodule:

1. Navigate to the repository root directory.
2. Add the submodule:
   ```bash
   git submodule add <project_repository_url> <directory_name>
   ```
3. Commit the changes:
   ```bash
   git commit -m "Added new submodule: <directory_name>"
   ```
4. Push the changes to the remote repository:
   ```bash
   git push
   ```

## Updating Submodules

To pull the latest changes for all submodules:

```bash
git submodule update --remote
```

## Removing a Submodule

To remove a submodule:

1. Delete the relevant entry from the `.gitmodules` file.
2. Remove the submodule directory:
   ```bash
   git rm --cached <directory_name>
   rm -rf <directory_name>
   ```
3. Commit and push the changes:
   ```bash
   git commit -m "Removed submodule: <directory_name>"
   git push
   ```

## Notes

- Each submodule is an independent Git repository. You can navigate to a submodule's directory and manage it as you would any Git repository.
- Always commit changes in submodules before updating their references in the parent repository.

## License

This repository is licensed under the MIT License. You are free to use, modify, and distribute this software. See the [LICENSE](LICENSE) file for details.

---

Thank you for exploring my portfolio! Feel free to reach out with any questions or feedback. Happy coding!
