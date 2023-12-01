class TodoDTO:
    title: str
    description: str

    def __init__(self, title: str, description: str):
        self.title = title
        self.description = description
